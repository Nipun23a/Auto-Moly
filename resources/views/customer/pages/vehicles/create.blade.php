@extends('customer.layouts.app')
@section('content')
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>sell your car</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">sell your car</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Sell wrapper  Start ------>
    <div class="impl_sell_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Sell your car in just 4 easy steps</h1>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <form id="impl_sform" action="#">
                        <div class="impl_steps_wrapper">
                            <h3><span class="step_number">1</span></h3>
                            <section>
                                <div class="impl_step">
                                    <h2 class="step-title">Contact Details</h2>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="userName" name="userName" type="text" class="form-control required" placeholder="YOUR NAME*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_mobile" type="text" name="mobile" class="form-control required number" placeholder="YOUR MOBILE*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_mail" type="text" name="email" class="form-control required email" placeholder="YOUR EMAIL*" data-valid="email" data-error="Email should be valid.">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_city" type="text" name="city" class="form-control required" placeholder="CITY">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_state" type="text" name="state" class="form-control required" placeholder="STATE">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_pin" type="text" name="pincode" class="form-control required number" placeholder="PINCODE">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3><span class="step_number">2</span></h3>
                            <section>
                                <!--second step-->
                                <div class="impl_step">
                                    <h2 class="step-title">Car Details</h2>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_brand" type="text" name="BRND" class="form-control required" placeholder="CAR BRAND">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_modal" type="text" name="model" class="form-control required" placeholder="MODEL">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_year" type="text" name="year" class="form-control required number" placeholder="YEAR">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_meter" type="text" name="meter" class="form-control required" placeholder="KILOMETERS DRIVEN">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_color" type="text" name="color" class="form-control required" placeholder="COLOR">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="step_price" type="text" name="price" class="form-control required" placeholder="PRICE">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3><span class="step_number">3</span></h3>
                            <section>
                                <!--third step-->
                                <div class="impl_step">
                                    <h2 class="step-title">Car images</h2>
                                    <ul class="step_car_img">
                                        <li class="step_imgs"><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid" />
                                            <div class="step_car_select">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        <li class="step_imgs"><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid" />
                                            <div class="step_car_select">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        <li><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid" />
                                            <input type="file" />
                                        </li>
                                        <li><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid" />
                                            <input type="file" />
                                        </li>
                                        <li><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid" />
                                            <input type="file" />
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <h3><span class="step_number">4</span></h3>
                            <section>
                                <!--fourth step-->
                                <div class="impl_step">
                                    <h2 class="step-title">overview</h2>
                                    <ul class="step_car_img">
                                        <li class="">
                                            <img src="http://via.placeholder.com/170x170" alt="" class="img-fluid step_view_img" />
                                            <img src="http://via.placeholder.com/170x170/fff" alt="" class="img-fluid step_view_img_over" />

                                        </li>
                                        <li class="step_imgs"><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid step_view_img" />
                                            <img src="http://via.placeholder.com/170x170/fff" alt="" class="img-fluid step_view_img_over" />
                                        </li>
                                        <li class="step_imgs"><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid step_view_img" />
                                            <img src="http://via.placeholder.com/170x170/fff" alt="" class="img-fluid step_view_img_over" />
                                        </li>
                                        <li class="step_imgs"><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid step_view_img" />
                                            <img src="http://via.placeholder.com/170x170/fff" alt="" class="img-fluid step_view_img_over" />
                                        </li>
                                        <li class="step_imgs"><img src="http://via.placeholder.com/170x170" alt="" class="img-fluid step_view_img" />
                                            <img src="http://via.placeholder.com/170x170/fff" alt="" class="img-fluid step_view_img_over" />
                                        </li>
                                    </ul>
                                    <div class="step_car_features">
                                        <ul>
                                            <li><span class="fea_name">car brand</span> <span class="fea_colon">: </span><span class="fea_value">Serpent</span> </li>
                                            <li><span class="fea_name">color</span> <span class="fea_colon">: </span><span class="fea_value">white</span> </li>
                                            <li><span class="fea_name">model</span> <span class="fea_colon">: </span><span class="fea_value">Serpentz8 </span> </li>
                                            <li><span class="fea_name">driven</span> <span class="fea_colon">: </span> <span class="fea_value">12000 kms </span> </li>
                                            <li><span class="fea_name">year</span> <span class="fea_colon">: </span><span class="fea_value">2015 </span> </li>
                                            <li><span class="fea_name">price</span> <span class="fea_colon">: </span><span class="fea_value">$81000</span> </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!------ Footer Section Start ------>
@endsection
