@extends('customer.layouts.app')

@section('content')

<!-- Banner area start -->
<section class="rts-banner-area bg_image_one jarallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-area-one bg_image">
                    <div class="banner-content-area">
                        <div class="pre-title wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s">
                            <span>Shop With Confidence – Quality Vehicles</span>
                        </div>
                        <h1 class="title wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">Discover
                            Our Best Deals On
                            New And Used <span>Cars</span></h1>
                        <div class="select-area-down wow fadeInUp" data-wow-delay=".8s" data-wow-duration="1s">
                            <form action="#" method="get" accept-charset="utf-8">
                                <select name="my_select" class="mySelect">
                                    <option value="2" selected>Car Make</option>
                                    <option value="10">Mazda</option>
                                    <option value="1">Citroen</option>
                                    <option value="13">Honda</option>
                                    <option value="14">Mitsubishi</option>
                                    <option value="15">Peugeot</option>
                                </select>
                            </form>
                            <form class="select-2" action="#" method="get" accept-charset="utf-8">
                                <select name="my_select2" class="my_select2">
                                    <option value="2" selected>Car Model</option>
                                    <option value="10">155</option>
                                    <option value="1">151</option>
                                    <option value="13">150</option>
                                    <option value="14">152</option>
                                    <option value="15">156</option>
                                </select>
                            </form>
                            <form class="select-2" action="#" method="get" accept-charset="utf-8">
                                <select name="my_select2" class="my_select2">
                                    <option value="2" selected>Price</option>
                                    <option value="10">22,000$</option>
                                    <option value="1">27,000$</option>
                                    <option value="13">30,000$</option>
                                    <option value="14">32,000$</option>
                                    <option value="15">38,000$</option>
                                </select>
                            </form>
                            <button type="submit" class="rts-btn radius-big icon btn-primary">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.69 10.69L13 13M12.3333 6.68575C12.3333 9.826 9.796 12.3715 6.667 12.3715C3.53725 12.3715 1 9.826 1 6.6865C1 3.54475 3.53725 1 6.66625 1C9.796 1 12.3333 3.5455 12.3333 6.68575Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner area end -->
<!-- Category Area Start -->
<section class="rts-category-area rts-section-gap">
    <div class="container">
        <div class="section-title-area">
            <p class="sub-title wow fadeInUp" data-wow-delay=".1s" data-wow-duration=".8s">Car Category</p>
            <h2 class="section-title wow move-right">Browse By <span>Car</span> Type</h2>
        </div>
        <div class="section-inner wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
            <div class="swiper category-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="category-wrapper">
                            <div class="icon">
                                <img src="assets/images/category/01.svg" alt="">
                            </div>
                            <h6 class="title"><a href="#">Hatchback</a></h6>
                            <p class="desc">30+ Car</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-wrapper">
                            <div class="icon">
                                <img src="assets/images/category/02.svg" alt="">
                            </div>
                            <h6 class="title"><a href="#">Minivans</a></h6>
                            <p class="desc">20+ Car</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-wrapper">
                            <div class="icon">
                                <img src="assets/images/category/03.svg" alt="">
                            </div>
                            <h6 class="title"><a href="#">Luxury Cars</a></h6>
                            <p class="desc">15+ Car</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-wrapper">
                            <div class="icon">
                                <img src="assets/images/category/04.svg" alt="">
                            </div>
                            <h6 class="title"><a href="#">Sedans</a></h6>
                            <p class="desc">25+ Car</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-wrapper">
                            <div class="icon">
                                <img src="assets/images/category/05.svg" alt="">
                            </div>
                            <h6 class="title"><a href="#">Convertible</a></h6>
                            <p class="desc">55+ Car</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-wrapper">
                            <div class="icon">
                                <img src="assets/images/category/06.svg" alt="">
                            </div>
                            <h6 class="title"><a href="#">Sports Car</a></h6>
                            <p class="desc">35+ Car</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="bg-shape-area">
        <img src="assets/images/category/shape/shape-01.svg" alt="">
        <img src="assets/images/category/shape/shape-02.svg" alt="">
    </div>
</section>
<!-- Category Area End -->
<!-- Portfolio Area Start -->
<section class="rts-portfolio-area rts-section-gap">
    <div class="section-title-area2">
        <p class="sub-title wow fadeInUp" data-wow-delay=".1s" data-wow-duration=".8s">Select Car</p>
        <h2 class="section-title wow move-right">Our Amazing <span>Car</span></h2>
    </div>
    <div class="tab-area">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="new-cars-tab" data-bs-toggle="tab" data-bs-target="#new-cars" type="button" role="tab" aria-controls="new-cars" aria-selected="true">New Cars</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="used-tab" data-bs-toggle="tab" data-bs-target="#used" type="button" role="tab" aria-controls="used" aria-selected="false">Used Cars</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="trending-tab" data-bs-toggle="tab" data-bs-target="#trending" type="button" role="tab" aria-controls="trending" aria-selected="false">Trending
                    Cars</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="stocks-tab" data-bs-toggle="tab" data-bs-target="#stocks" type="button" role="tab" aria-controls="stocks" aria-selected="false">In Stocks</button>
            </li>
        </ul>
    </div>
    <div class="section-inner mt--80 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
        <div class=" tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="new-cars" role="tabpanel" aria-labelledby="new-cars-tab">
                <div class="slider-area">
                    <div class="swiper projectSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html">
                                            <img src="assets/images/portfolio/01.webp" alt="">
                                        </a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/01.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination-2"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="used" role="tabpanel" aria-labelledby="used-tab">
                <div class="slider-area">
                    <div class="swiper projectSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/01.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/01.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination-2"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                <div class="slider-area">
                    <div class="swiper projectSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/01.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                                Petrol
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                                Autometic
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/04.svg" alt="">
                                                4 Person
                                            </li>
                                        </ul>
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/01.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                                Petrol
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                                Autometic
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/04.svg" alt="">
                                                4 Person
                                            </li>
                                        </ul>
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination-2"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="stocks" role="tabpanel" aria-labelledby="stocks-tab">
                <div class="slider-area">
                    <div class="swiper projectSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/01.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                                Petrol
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                                Autometic
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/04.svg" alt="">
                                                4 Person
                                            </li>
                                        </ul>
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/01.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,000$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Thunderbolt Car</a>
                                        </h5>
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/02.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,300$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volvo. 1927</a></h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                105 Miles
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/02.svg" alt="">
                                                Petrol
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/03.svg" alt="">
                                                Autometic
                                            </li>
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/04.svg" alt="">
                                                4 Person
                                            </li>
                                        </ul>
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="project-wrapper">
                                    <div class="image-area">
                                        <a href="portfolio-details.html"><img src="assets/images/portfolio/03.webp" alt=""></a>
                                    </div>
                                    <span class="price">14,500$</span>
                                    <div class="content-area">
                                        <h5 class="title"><a href="portfolio-details.html">Volkswagen. 1938</a>
                                        </h5>
                                        <ul class="feature-area">
                                            <li>
                                                <img src="assets/images/portfolio/feature-icon/01.svg" alt="">
                                                110 Miles
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
                                        <a href="portfolio-details.html" class="rts-btn btn-primary radius-big">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Area End -->
<!-- About Area Start -->
@include('customer.components.about')
<!-- About Area End -->
<!-- Video Area Start -->
@include('customer.components.video')
<!-- Video Area End -->
<!-- Brands Area Start -->
@include('customer.components.brands')
<!-- Brands Are Stop -->
@include('customer.components.feature')
@include('customer.components.testomonial')


@include('customer.components.contact-footer')


@endsection
