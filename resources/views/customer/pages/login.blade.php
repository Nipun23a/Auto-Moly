@extends('customer.layouts.app')
@section('content')
    <body class="account-page-body">
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

            <!-- Breadcrumb area start -->
            <!-- rts breadcrumb area start -->
            <div class="rts-breadcrumb-area service jarallax">
                <div class="container">
                    <div class="breadcrumb-area-wrapper">
                        <h1 class="title">Account</h1>
                        <div class="nav-bread-crumb">
                            <a href="index.html">Home</a>
                            <a href="#" class="current">Account</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- rts breadcrumb area end -->
            <!-- Breadcrumb area end -->
            <!-- Contact Start -->
            <div class="rts-contact-page-form-area rts-section-gapNew rts-section-gap account">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mian-wrapper-form">
                                <div class="title-mid-wrapper-home-two sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                                    <h3 class="title">Login</h3>
                                </div>
                                <form id="contact-form-contact" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <input type="email" name="email" placeholder="Email Address or Username" value="{{ old('email') }}" required>

                                    <input type="password" name="password" placeholder="Password" required>

                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="rememberMe">Remember me</label>
                                    </div>

                                    <button type="submit" class="rts-btn btn-primary radius-small">Log In</button>

                                    <div class="forgot-password">
                                        <a href="#">Forgot Your Password?</a>
                                    </div>

                                    {{-- Show error messages --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-2">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mian-wrapper-form">
                                <div class="title-mid-wrapper-home-two sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                                    <h3 class="title">Registration</h3>
                                </div>
                                <form id="contact-form-contact" action="{{ route('register') }}" method="post">
                                    @csrf <!-- Laravel CSRF token for security -->
                                    <input type="text" name="name" placeholder="Your Name" required>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <input type="password" name="new_password" placeholder="New Password" required>
                                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>

                                    <!-- Telephone Section -->
                                    <input type="text" name="telephone" placeholder="Telephone Number" required>

                                    <!-- Address as Textarea -->
                                    <input name="address" placeholder="Address" required></input>

                                    <button type="submit" class="rts-btn btn-primary radius-small">Register</button>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->
@endsection

