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
        <div id="preloader">
            <div id="status">
                <img src="images/logo.png" alt="" />
                <div class="loader">
                    Loading...
                    <div class="ball"></div>
                    <div class="ball"></div>
                    <div class="ball"></div>
                </div>
            </div>
        </div>

        @include('customer.components.header')


    </body>
</html>
