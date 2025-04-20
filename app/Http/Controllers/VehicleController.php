<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        // Get all brands and categories for filters
        $brands = Brand::all();
        $categories = Category::all();

        // Build query with filters
        $query = Vehicle::with(['model.brand', 'model.category', 'images'])
            ->where('status', 'available');

        // Apply filters if provided
        if ($request->has('brand')) {
            $brandIds = $request->brand;
            $query->whereHas('model.brand', function($q) use ($brandIds) {
                $q->whereIn('brands.id', (array)$brandIds);
            });
        }

        if ($request->has('category')) {
            $categoryIds = $request->category;
            $query->whereHas('model.category', function($q) use ($categoryIds) {
                $q->whereIn('categories.id', (array)$categoryIds);
            });
        }

        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }

        if ($request->has('condition')) {
            $query->where('condition', $request->condition);
        }

        // Sort vehicles
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Get price ranges before applying pagination
        $minPrice = Vehicle::where('status', 'available')->min('price') ?? 0;
        $maxPrice = Vehicle::where('status', 'available')->max('price') ?? 100000;

        // Get paginated results
        $vehicles = $query->paginate(9);

        // Count total vehicles
        $totalVehicles = Vehicle::where('status', 'available')->count();

        return view('customer.pages.vehicles.index', compact('vehicles', 'brands', 'categories', 'totalVehicles', 'minPrice', 'maxPrice'));
    }

    public function show($slug)
    {
        $vehicle = Vehicle::with(['model.brand', 'model.category', 'images', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Get similar vehicles
        $similarVehicles = Vehicle::with(['model.brand', 'images'])
            ->where('model_id', $vehicle->model_id)
            ->where('id', '!=', $vehicle->id)
            ->where('status', 'active')
            ->limit(3)
            ->get();

        return view('customer.pages.vehicle.show', compact('vehicle', 'similarVehicles'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $vehicles = Vehicle::with(['model.brand', 'images'])
            ->where('status', 'active')
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->orWhereHas('model', function($mq) use ($query) {
                        $mq->where('name', 'like', "%{$query}%");
                    })
                    ->orWhereHas('model.brand', function($bq) use ($query) {
                        $bq->where('name', 'like', "%{$query}%");
                    });
            })
            ->paginate(9);

        return view('customer.pages.vehicle.index', compact('vehicles', 'query'));
    }

    public function filterByCondition($condition)
    {
        $brands = Brand::all();
        $categories = Category::all();

        $vehicles = Vehicle::with(['model.brand', 'images'])
            ->where('status', 'active')
            ->where('condition', $condition)
            ->paginate(9);

        $totalVehicles = Vehicle::where('status', 'active')
            ->where('condition', $condition)
            ->count();

        return view('customer.pages.vehicle.index', compact('vehicles', 'brands', 'categories', 'totalVehicles', 'condition'));
    }

    public function compare(Request $request)
    {
        $vehicleIds = $request->get('vehicles', []);

        $vehicles = Vehicle::with(['model.brand', 'images'])
            ->whereIn('id', $vehicleIds)
            ->get();

        return view('customer.pages.vehicle.compare', compact('vehicles'));
    }
}
