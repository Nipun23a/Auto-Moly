@extends('customer.layouts.app')
@section('content')
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>company</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">company</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ About our company Start ------>
    <div class="impl_about_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>who we are</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="impl_about_data">
                        <h2>A Bit About Us</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now. Use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized .</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="impl_progress_wrapper">
                        <div class="barWrapper">
                            <span class="progressText">Customers</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%;">
                                    <div class="progress-value">5410</div>
                                </div>
                            </div>
                        </div>
                        <div class="barWrapper">
                            <span class="progressText">Purchases</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%;">
                                    <div class="progress-value">8612</div>
                                </div>
                            </div>
                        </div>
                        <div class="barWrapper">
                            <span class="progressText">Sales</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 80%;">
                                    <div class="progress-value">9782</div>
                                </div>
                            </div>
                        </div>
                        <div class="barWrapper">
                            <span class="progressText">REpairs</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%;">
                                    <div class="progress-value">6450</div>
                                </div>
                            </div>
                        </div>
                        <div class="barWrapper">
                            <span class="progressText">Vehicles Stock</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 90%;">
                                    <div class="progress-value">6450</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ History Section Start ------>
    <div class="impl_history_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>our history</h1>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="impl_hstry_timeline">
                        <div class="impl_timeline_wrapper">
                            <ul class="impl_timeline">
                                <li>
                                    <div class="impl_tl_item">
                                        <h2>2001</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majorty have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                        </p>
                                        <span class="impl_tl_icon">
											<span class="impl_tl_dot"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="impl_tl_item impl_tl_item_rt">
                                        <h2>2004</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majorty have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                        <span class="impl_tl_icon">
											<span class="impl_tl_dot"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="impl_tl_item">
                                        <h2>2011</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majorty have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                        <span class="impl_tl_icon">
											<span class="impl_tl_dot"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="impl_tl_item impl_tl_item_rt">
                                        <h2>2017</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majorty have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                        <span class="impl_tl_icon">
											<span class="impl_tl_dot"></span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('customer.components.testimonial')
@endsection
