<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/fav.svg')}}">
        <title>Auto-Moly | Find the Best Deals on New & Used Vehicles</title>
        <meta name="description" content="Your trusted source for expert healthcare services and car information. Providing personalized care, advanced treatments, and reliable car dealing to help you achieve better health.">
        <link rel="stylesheet" href="{{asset('assets/css/plugins/plugins.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/plugins/magnifying-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/rt-icon.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    </head>
    <body>

        <!-- Preloader -->
        <div class="loader-wrapper">
            <div class="loader">
            </div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <div class="search-input-area">
            <div class="container">
                <div class="search-input-inner">
                    <div class="input-div">
                        <input class="search-input autocomplete" type="text" placeholder="Search by keyword or #">
                        <button><i class="far fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
        </div>
        <div id="anywhere-home">
        </div>
        <!-- progress area start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
                </path>
            </svg>
        </div>
        <!-- progress area end -->
        <div class="rts-wrapper">
            <div class="rts-wrapper-inner">
                {{-- Header --}}
                @include('customer.components.header')

                {{-- Main Content --}}
                <main>
                    @yield('content')
                </main>
            </div>
        </div>

        {{-- Footer--}}
        @include('customer.components.footer')
        {{-- Mobile Menu--}}
        @include('customer.components.moblile-header')






        <script src="{{ asset('assets/js/plugins/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/waw.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/counter-up.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/contact-form.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/swiper.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/metismenu.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jarallax.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/smooth-scroll.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/magnifying-popup.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/waypoint.js') }}"></script>
        <!-- main js here -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
