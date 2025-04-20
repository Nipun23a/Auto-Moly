@extends('customer.layouts.app')
@section('content')
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>{{ $vehicle->title }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customer.vehicles.index') }}">Vehicles</a></li>
                        <li class="breadcrumb-item active">{{ $vehicle->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Purchase Car Start ------>
    <div class="impl_buy_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="impl_buycar_wrapper">
                        <div class="impl_buycar_color" id="color_car">
                            <div class="slider slider-for1 enlarged-image">
                                @foreach($vehicle->images as $image)
                                    <div>
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $vehicle->title }}" class="img-fluid">
                                    </div>
                                @endforeach
                                @if($vehicle->images->isEmpty())
                                    <div>
                                        <img src="{{ asset('images/placeholder-car.jpg') }}" alt="{{ $vehicle->title }}" class="img-fluid">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="impl_buycar_data">
                        <h1>{{ $vehicle->model->brand->name }}, {{ $vehicle->model->name }}</h1>
                        <h1>${{ number_format($vehicle->price) }}</h1>
                        <div class="car_emi_wrapper">
                            @php
                                $emiEstimate = round($vehicle->price / 36);
                            @endphp
                            <span>EMI Starts at ${{ number_format($emiEstimate) }} /- *</span>
                            <a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Get EMI Assistance</a>
                        </div>
                        <p>{{ Str::limit($vehicle->description, 250) }}</p>
                        <div class="impl_old_buy_btn">
                            <a href="#" class="impl_btn">buy now</a>
                            <a href="{{ route('customer.vehicles.compare', ['vehicles[]' => $vehicle->id]) }}" class="impl_btn">compare</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Car Specifications Start ------>
    <div class="impl_spesi_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="impl_car_spesi_list">
                        <div class="impl_heading">
                            <h1>Car Specifications</h1>
                        </div>
                        <ul>
                            <li>
                                <h3>Year</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width:{{ min(($vehicle->year - 2000) * 5, 100) }}%"></div>
                                </div>
                            </li>
                            <li>
                                <h3>Mileage</h3>
                                <div class="progress">
                                    @php
                                        $mileagePercentage = min(($vehicle->mileage / 150000) * 100, 100);
                                        $inverseMileage = 100 - $mileagePercentage; // Lower mileage is better
                                    @endphp
                                    <div class="progress-bar" style="width:{{ $inverseMileage }}%"></div>
                                </div>
                            </li>
                            <li>
                                <h3>Fuel Type</h3>
                                <div class="progress">
                                    @php
                                        $fuelEfficiency = match($vehicle->fuel_type) {
                                            'electric' => 90,
                                            'hybrid' => 75,
                                            'gas' => 60,
                                            'diesel' => 50,
                                            default => 60
                                        };
                                    @endphp
                                    <div class="progress-bar" style="width:{{ $fuelEfficiency }}%"></div>
                                </div>
                            </li>
                            <li>
                                <h3>Transmission</h3>
                                <div class="progress">
                                    @php
                                        $transScore = match($vehicle->transmission) {
                                            'automatic' => 80,
                                            'manual' => 70,
                                            'semi-automatic' => 75,
                                            'cvt' => 85,
                                            default => 70
                                        };
                                    @endphp
                                    <div class="progress-bar" style="width:{{ $transScore }}%"></div>
                                </div>
                            </li>
                            <li>
                                <h3>Condition</h3>
                                <div class="progress">
                                    @php
                                        $conditionScore = match($vehicle->condition) {
                                            'new' => 100,
                                            'like new' => 90,
                                            'excellent' => 80,
                                            'good' => 70,
                                            'fair' => 50,
                                            default => 70
                                        };
                                    @endphp
                                    <div class="progress-bar" style="width:{{ $conditionScore }}%"></div>
                                </div>
                            </li>
                            @if($vehicle->history)
                                <li>
                                    <h3>Ownership</h3>
                                    <div class="progress">
                                        @php
                                            $ownershipScore = match($vehicle->history->ownership_count) {
                                                1 => 90,
                                                2 => 70,
                                                3 => 50,
                                                default => 30
                                            };
                                        @endphp
                                        <div class="progress-bar" style="width:{{ $ownershipScore }}%"></div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Car description wrapper Start ------>
    <div class="impl_descrip_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>description</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>Car Brand & Model</h2>
                        <p>{{ $vehicle->model->brand->name }}</p>
                        <p>{{ $vehicle->model->name }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>FUEL ECONOMY</h2>
                        <p>Fuel Type: {{ ucfirst($vehicle->fuel_type) }}</p>
                        @if($vehicle->fuel_type !== 'electric')
                            <p>Estimated MPG: 20-25 city/highway</p>
                        @else
                            <p>Electric Range: 250-300 miles</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>ENGINE TYPE</h2>
                        <p>{{ ucfirst($vehicle->fuel_type) }} Engine</p>
                        <p>{{ ucfirst($vehicle->transmission) }} Transmission</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>TRANSMISSION</h2>
                        <p>{{ ucfirst($vehicle->transmission) }}</p>
                        @if($vehicle->transmission == 'automatic')
                            <p>With Manual Shifting Mode</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>CONDITION</h2>
                        <p>{{ ucfirst($vehicle->condition) }}</p>
                        <p>Mileage: {{ number_format($vehicle->mileage) }} miles</p>
                        @if($vehicle->history)
                            <p>Ownership: {{ $vehicle->history->ownership_count }} owner(s)</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>VEHICLE TYPE</h2>
                        <p>{{ $vehicle->model->category->name ?? 'Vehicle' }}</p>
                        <p>Year: {{ $vehicle->year }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>LOCATION</h2>
                        <p>{{ $vehicle->location }}</p>
                        <p>Available for viewing</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>HISTORY</h2>
                        @if($vehicle->history)
                            <p>Accidents: {{ $vehicle->history->accidents ?? 'None reported' }}</p>
                            <p>Service Records: {{ count($vehicle->history->service_records ?? []) }}</p>
                            <p>Flood Damage: {{ $vehicle->history->has_flood_damage ? 'Yes' : 'No' }}</p>
                            <p>Salvage Title: {{ $vehicle->history->has_salvage_title ? 'Yes' : 'No' }}</p>
                        @else
                            <p>Vehicle history not available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($reviews))
        <!------ User Reviews wrapper Start ------>
        <div class="impl_review_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="impl_heading">
                            <h1>user reviews</h1>
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1">
                        <div class="review_slider">
                            @forelse($reviews as $review)
                                <div class="impl_review_box">
                                    <h2>{{ $review->title }}</h2>
                                    <ul class="review_rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <li><i class="fa fa-star {{ $i <= $review->rating ? '' : 'o' }}" aria-hidden="true"></i></li>
                                        @endfor
                                    </ul>
                                    <div class="review_date">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $review->created_at->format('d F Y') }}
                                    </div>
                                    <p>{{ $review->content }}</p>
                                    <h4 class="review_author">By: {{ $review->user->name }}</h4>
                                </div>
                            @empty
                                <div class="impl_review_box">
                                    <h2>No Reviews Yet</h2>
                                    <p>Be the first to review this vehicle!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!------ Related Cars wrapper Start ------>
    @if($relatedVehicles->count() > 0)
        <div class="impl_related_wrapper mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="impl_heading">
                            <h1>related vehicles</h1>
                        </div>
                    </div>
                    @foreach($relatedVehicles as $relatedVehicle)
                        <div class="col-lg-4 col-md-6">
                            <div class="impl_fea_car_box">
                                <div class="impl_fea_car_img">
                                    @if($relatedVehicle->images->where('is_primary', true)->first())
                                        <img src="{{ asset('storage/' . $relatedVehicle->images->where('is_primary', true)->first()->image_path) }}" alt="{{ $relatedVehicle->title }}" class="img-fluid impl_frst_car_img" />
                                        <img src="{{ asset('storage/' . $relatedVehicle->images->where('is_primary', true)->first()->image_path) }}" alt="{{ $relatedVehicle->title }}" class="img-fluid impl_hover_car_img" />
                                    @else
                                        <img src="{{ asset('images/placeholder-car.jpg') }}" alt="{{ $relatedVehicle->title }}" class="img-fluid impl_frst_car_img" />
                                        <img src="{{ asset('images/placeholder-car.jpg') }}" alt="{{ $relatedVehicle->title }}" class="img-fluid impl_hover_car_img" />
                                    @endif
                                    <span class="impl_img_tag" title="compare">
                                <a href="{{ route('customer.vehicles.compare', ['vehicles[]' => $relatedVehicle->id]) }}">
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </a>
                            </span>
                                </div>
                                <div class="impl_fea_car_data">
                                    <h2><a href="{{ route('customer.vehicles.show', $relatedVehicle->slug) }}">{{ $relatedVehicle->title }}</a></h2>
                                    <ul>
                                        <li><span class="impl_fea_title">model</span>
                                            <span class="impl_fea_name">{{ $relatedVehicle->model->name }}</span></li>
                                        <li><span class="impl_fea_title">Vehicle Status</span>
                                            <span class="impl_fea_name">{{ ucfirst($relatedVehicle->condition) }}</span></li>
                                        <li><span class="impl_fea_title">Brand</span>
                                            <span class="impl_fea_name">{{ $relatedVehicle->model->brand->name }}</span></li>
                                    </ul>
                                    <div class="impl_fea_btn">
                                        <button class="impl_btn">
                                            <span class="impl_doller">${{ number_format($relatedVehicle->price) }}</span>
                                            <span class="impl_bnw">buy now</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <style>
        .enlarged-image {
            width: 120%; /* Makes image 20% larger than its container */
            max-width: none; /* Removes any max-width restrictions */
            transform: scale(1.2); /* Alternative approach to enlarge by 20% */
            margin: 0 auto; /* Centers the enlarged image */
            object-fit: contain; /* Maintains aspect ratio */
            display: block; /* Ensures proper block formatting */
            transition: all 0.3s ease; /* Adds smooth transition when size changes */
        }
    </style>
@endsection
