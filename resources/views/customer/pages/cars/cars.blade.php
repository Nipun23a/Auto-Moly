@extends('customer.layouts.app')
@section('content')
    <!-- Breadcrumb area start -->
    <!-- rts breadcrumb area start -->
    <div class="rts-breadcrumb-area portfolio-3 jarallax">
        <div class="container">
            <div class="breadcrumb-area-wrapper">
                <h1 class="title">Cars</h1>
                <div class="nav-bread-crumb">
                    <a href="index.html">Home</a>
                    <a href="#" class="current">Cars</a>
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumb area end -->
    <!-- Breadcrumb area end -->
    <div class="rts-portfolio-area inner rts-section-gapNew">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <div class="left-side-bar">
                            <div class="search-area side-box">
                                <h2>Cars Search</h2>
                                <form action="#">
                                    <div class="input-wrapper">
                                        <input type="text" placeholder="Search Vehicles" required>
                                        <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                                <span class="cross"><i class="fa-light fa-xmark"></i></span>
                            </div>
                            <div class="car-make side-box">
                                <h2>Car Make</h2>
                                <ul class="checkbox-list">
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" checked />
                                            <span>Mercedes-Benz</span>
                                        </label>
                                        <span>(130)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Volkswagen</span>
                                        </label>
                                        <span>(80)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Mitsubishi</span>
                                        </label>
                                        <span>(199)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Honda</span>
                                        </label>
                                        <span>(70)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Lamborghini</span>
                                        </label>
                                        <span>(160)</span>
                                    </li>
                                </ul>
                                <span class="cross"><i class="fa-light fa-xmark"></i></span>
                            </div>
                            <div class="car-make side-box">
                                <h2>Car Model</h2>
                                <ul class="checkbox-list">
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" checked />
                                            <span>Chevrolet</span>
                                        </label>
                                        <span>(64)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Ford</span>
                                        </label>
                                        <span>(199)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Tesla</span>
                                        </label>
                                        <span>(59)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>BMW</span>
                                        </label>
                                        <span>(230)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Audi</span>
                                        </label>
                                        <span>(30)</span>
                                    </li>
                                </ul>
                                <span class="cross"><i class="fa-light fa-xmark"></i></span>
                            </div>
                            <div class="price-box side-box">
                                <h2>Price</h2>
                                <div class="slider-container">
                                    <!-- Histogram -->
                                    <div class="histogram">
                                        <!-- Create bars dynamically -->
                                        <div class="histogram-bar" style="height: 67px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                        <div class="histogram-bar" style="height: 52px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                        <div class="histogram-bar" style="height: 99px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                        <div class="histogram-bar" style="height: 75px;"></div>
                                        <div class="histogram-bar" style="height: 93px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                        <div class="histogram-bar" style="height: 99px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                        <div class="histogram-bar" style="height: 75px;"></div>
                                        <div class="histogram-bar" style="height: 93px;"></div>
                                        <div class="histogram-bar" style="height: 93px;"></div>
                                        <div class="histogram-bar" style="height: 75px;"></div>
                                        <div class="histogram-bar" style="height: 98px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                        <div class="histogram-bar" style="height: 107px;"></div>
                                        <div class="histogram-bar" style="height: 75px;"></div>
                                        <div class="histogram-bar" style="height: 93px;"></div>
                                        <div class="histogram-bar" style="height: 102px;"></div>
                                        <div class="histogram-bar" style="height: 52px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                        <div class="histogram-bar" style="height: 94px;"></div>
                                        <div class="histogram-bar" style="height: 75px;"></div>
                                        <div class="histogram-bar" style="height: 86px;"></div>
                                    </div>

                                    <!-- Range Slider -->
                                    <div class="range-slider">
                                        <div class="track"></div>
                                        <div class="range" id="range"></div>
                                        <input type="range" id="minRange" min="0" max="100" value="20">
                                        <input type="range" id="maxRange" min="0" max="100" value="80">
                                    </div>

                                    <!-- Price Labels -->
                                    <div class="price-labels">
                                        <span id="minPrice">$500</span>
                                        <span id="maxPrice">$5000</span>
                                    </div>
                                </div>
                                <span class="cross"><i class="fa-light fa-xmark"></i></span>
                            </div>
                            <div class="car-make side-box">
                                <h2>Car Seats</h2>
                                <ul class="checkbox-list">
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" checked />
                                            <span>2 seats</span>
                                        </label>
                                        <span>(30)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>3 seats</span>
                                        </label>
                                        <span>(23)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>4 seats</span>
                                        </label>
                                        <span>(179)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>5 seats</span>
                                        </label>
                                        <span>(40)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>6 seats</span>
                                        </label>
                                        <span>(120)</span>
                                    </li>
                                </ul>
                                <span class="cross"><i class="fa-light fa-xmark"></i></span>
                            </div>
                            <div class="car-make side-box">
                                <h2>Car Color</h2>
                                <ul class="checkbox-list">
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" checked />
                                            <span>Matte Black</span>
                                        </label>
                                        <span>(30)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Orange</span>
                                        </label>
                                        <span>(23)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Black</span>
                                        </label>
                                        <span>(179)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Yellow</span>
                                        </label>
                                        <span>(40)</span>
                                    </li>
                                    <li class="checkbox-item">
                                        <label class="checkbox-label">
                                            <input type="checkbox" />
                                            <span>Neon Colors</span>
                                        </label>
                                        <span>(120)</span>
                                    </li>
                                </ul>
                                <span class="cross"><i class="fa-light fa-xmark"></i></span>
                            </div>
                            <div class="tag-area side-box">
                                <h2>Fuel</h2>
                                <ul>
                                    <li>Gasoline</li>
                                    <li>Diesel</li>
                                    <li>Plug-in Hybrid</li>
                                    <li>Hybrid</li>
                                    <li>Electric</li>
                                </ul>
                                <span class="cross"><i class="fa-light fa-xmark"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="right">
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="{{route('car-details')}}">
                                    <img src="assets/images/portfolio/08-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Honda Civic Hatchback</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="{{route('car-details')}}" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/05-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Mercedes-Benz E-Class</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/07-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Mazda MX-5 Miata</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/08-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Honda Civic Hatchback</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/05-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Mercedes-Benz E-Class</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/07-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Mazda MX-5 Miata</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/08-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Honda Civic Hatchback</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style mb--30">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/05-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Mercedes-Benz E-Class</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-wrapper2 list-style">
                            <div class="image-area">
                                <a href="portfolio-details.html">
                                    <img src="assets/images/portfolio/07-sm.webp" height="206" alt="">
                                </a>
                            </div>
                            <div class="content-area">
                                <h6 class="title"><a href="portfolio-details.html">Mazda MX-5 Miata</a>
                                </h6>
                                <ul class="feature-area">
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                        100 Miles
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                        Petrol
                                    </li>
                                    <li>
                                        <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                        Autometic
                                    </li>
                                </ul>
                                <div class="button-area">
                                    <p class="cw">$400</p>
                                    <a href="portfolio-details.html" class="rts-btn btn-primary radius-small">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="rts-btn load-more-btn btn-border">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('customer.components.contact-footer')
@endsection
