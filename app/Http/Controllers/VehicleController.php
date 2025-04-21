<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Vehicle;
use App\Models\VehicleHistory;
use App\Models\VehicleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
        // Find the vehicle by slug with all necessary relationships
        $vehicle = Vehicle::with([
            'model.brand',
            'model.category',
            'images',
            'history',
            'service.service'
        ])->where('slug', $slug)->firstOrFail();

        // Get related vehicles (same brand or category)
        $relatedVehicles = Vehicle::with(['model.brand', 'images'])
            ->where('id', '!=', $vehicle->id)
            ->where('status', 'available')
            ->where(function($query) use ($vehicle) {
                $query->whereHas('model', function($q) use ($vehicle) {
                    $q->where('brand_id', $vehicle->model->brand_id)
                        ->orWhere('category_id', $vehicle->model->category_id);
                });
            })
            ->limit(3)
            ->get();

        // Get vehicle colors if applicable
        $colors = $vehicle->images->pluck('image_path')->unique()->values()->all();

        return view('customer.pages.vehicles.show', compact('vehicle', 'relatedVehicles', 'colors',));
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

        return view('customer.pages.vehicles.index', compact('vehicles', 'query'));
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

        return view('customer.pages.vehicles.index', compact('vehicles', 'brands', 'categories', 'totalVehicles', 'condition'));
    }

    public function compare(Request $request)
    {
        $vehicleIds = $request->get('vehicles', []);

        $vehicles = Vehicle::with(['model.brand', 'images'])
            ->whereIn('id', $vehicleIds)
            ->get();

        return view('customer.pages.vehicles.compare', compact('vehicles'));
    }

    public function create(){
        $carModels = CarModel::all();
        return view('customer.pages.vehicles.create', compact('carModels'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'model_id' => 'required|exists:models,id',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'mileage' => 'required|numeric|min:0',
            'condition' => 'required|in:new,used,pre-owned',
            'transmission' => 'required|in:auto,manual',
            'fuel_type' => 'required|in:diesel,petrol,electric',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'accidents' => 'nullable|integer|min:0',
            'ownership_count' => 'nullable|integer|min:0',
            'has_flood_damage' => 'nullable|boolean',
            'has_salvage_title' => 'nullable|boolean',
            'service_records' => 'nullable|string',
            'history_notes' => 'nullable|string',
            'car_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'primary_image' => 'nullable|integer|min:0',
        ]);

        try {
            DB::beginTransaction();

            Log::info('Starting vehicle creation process', ['user_id' => auth()->id(), 'data' => $validatedData]);

            // Create slug
            $slug = Str::slug($validatedData['name']);
            $baseSlug = $slug;
            $counter = 1;
            while (Vehicle::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // Save vehicle
            $vehicle = new Vehicle();
            $vehicle->title = $validatedData['name'];
            $vehicle->slug = $slug;
            $vehicle->year = $validatedData['year'];
            $vehicle->price = $validatedData['price'];
            $vehicle->mileage = $validatedData['mileage'];
            $vehicle->fuel_type = $validatedData['fuel_type'];
            $vehicle->transmission = $validatedData['transmission'];
            $vehicle->condition = $validatedData['condition'];
            $vehicle->location = $validatedData['location'];
            $vehicle->description = $validatedData['description'] ?? null;
            $vehicle->status = 'pending';
            $vehicle->model_id = $validatedData['model_id'];
            $vehicle->user_id = auth()->id();
            $vehicle->save();

            Log::info('Vehicle created successfully', ['vehicle_id' => $vehicle->id]);

            // Save vehicle history
            $vehicleHistory = new VehicleHistory();
            $vehicleHistory->vehicle_id = $vehicle->id;
            $vehicleHistory->accidents = $validatedData['accidents'] ?? 0;
            $vehicleHistory->ownership_count = $validatedData['ownership_count'] ?? 1;
            $vehicleHistory->has_flood_damage = $validatedData['has_flood_damage'] ?? false;
            $vehicleHistory->has_salvage_title = $validatedData['has_salvage_title'] ?? false;

            if (!empty($validatedData['service_records'])) {
                $serviceRecords = array_map('trim', explode(',', $validatedData['service_records']));
                $vehicleHistory->service_records = json_encode($serviceRecords);
                Log::info('Service records saved', ['records' => $serviceRecords]);
            }

            $vehicleHistory->notes = $validatedData['history_notes'] ?? null;
            $vehicleHistory->save();

            // Upload images
            if ($request->hasFile('car_images')) {
                $primaryImageIndex = $request->input('primary_image');
                $files = $request->file('car_images');

                foreach ($files as $index => $file) {
                    $filename = $vehicle->id . '_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('public/vehicle_images', $filename);

                    $image = new VehicleImage();
                    $image->image_path = 'storage/vehicle_images/' . $filename;
                    $image->is_primary = ($primaryImageIndex !== null && (int)$primaryImageIndex === $index);
                    $image->vehicle_id = $vehicle->id;
                    $image->save();

                    Log::info('Image uploaded', ['image' => $image->image_path, 'is_primary' => $image->is_primary]);
                }

                // Fallback to first image as primary if none was selected
                if ($primaryImageIndex === null && count($files) > 0) {
                    $firstImage = VehicleImage::where('vehicle_id', $vehicle->id)->first();
                    if ($firstImage) {
                        $firstImage->is_primary = true;
                        $firstImage->save();
                        Log::info('Default primary image set', ['image_id' => $firstImage->id]);
                    }
                }
            }

            DB::commit();

            Log::info('Vehicle listing completed successfully', ['vehicle_id' => $vehicle->id]);
            return redirect()->route('home')->with('success', 'Your vehicle has been listed successfully and is pending approval.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Vehicle listing failed', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Failed to list your vehicle. ' . $e->getMessage())->withInput();
        }
    }


}
