@extends('customer.layouts.app')
@section('content')
    <div class="impl_compare_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>select car</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">Ferocity C7</h2>
                        <div class="compare_img">
                            <img src="http://via.placeholder.com/200x180" alt="" class="img-fluid" />
                            <span class="cmpr_rmv_icon"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">select car 2</h2>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Brand">Select Brand</option>
                                <option value="1">Brand 1</option>
                                <option value="2">Brand 1</option>
                                <option value="3">Brand 1</option>
                                <option value="4">Brand 1</option>
                            </select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Model">Select Model</option>
                                <option value="1">Model 1</option>
                                <option value="2">Model 2</option>
                                <option value="3">Model 3</option>
                                <option value="4">Model 4</option>
                            </select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Version">Select Version</option>
                                <option value="1">Version 1</option>
                                <option value="2">Version 2</option>
                                <option value="3">Version 3</option>
                                <option value="4">Version 4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">select car 3</h2>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Brand">Select Brand</option>
                                <option value="1">Brand 1</option>
                                <option value="2">Brand 1</option>
                                <option value="3">Brand 1</option>
                                <option value="4">Brand 1</option>
                            </select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Model">Select Model</option>
                                <option value="1">Model 1</option>
                                <option value="2">Model 2</option>
                                <option value="3">Model 3</option>
                                <option value="4">Model 4</option>
                            </select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Version">Select Version</option>
                                <option value="1">Version 1</option>
                                <option value="2">Version 2</option>
                                <option value="3">Version 3</option>
                                <option value="4">Version 4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">select car 4</h2>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Brand">Select Brand</option>
                                <option value="1">Brand 1</option>
                                <option value="2">Brand 1</option>
                                <option value="3">Brand 1</option>
                                <option value="4">Brand 1</option>
                            </select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Model">Select Model</option>
                                <option value="1">Model 1</option>
                                <option value="2">Model 2</option>
                                <option value="3">Model 3</option>
                                <option value="4">Model 4</option>
                            </select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
                                <option data-display="Select Version">Select Version</option>
                                <option value="1">Version 1</option>
                                <option value="2">Version 2</option>
                                <option value="3">Version 3</option>
                                <option value="4">Version 4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="compare_btn">
                        <button class="impl_btn">compare</button>
                        <button class="impl_btn">reset all</button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-">
                    <div class="compare_table_wrapper">
                        <div class="compare_list_option">
                            <label class="compare_check_label">
                                Hide Common Features
                                <input type="checkbox" name="check">
                                <span class="label-text"></span>
                            </label>
                            <label class="compare_check_label">
                                Highlight Differences
                                <input type="checkbox" name="check">
                                <span class="label-text"></span>
                            </label>
                        </div>
                        <div class="compare_table">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Overview</th>
                                    <th>Car 1</th>
                                    <th>Car 2</th>
                                    <th>Car 3</th>
                                    <th>Car 4</th>
                                </tr>
                                </thead>
                                <tr class="bg_color">
                                    <td>Length (mm)</td>
                                    <td>4907</td>
                                    <td>4462</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Width (mm)</td>
                                    <td>1993</td>
                                    <td>1998</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Height (mm)</td>
                                    <td>1379</td>
                                    <td>1204</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Seating Capacity (Person)</td>
                                    <td>4</td>
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Displacement (cc)</td>
                                    <td>6262</td>
                                    <td>7993</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Fuel Type</td>
                                    <td>petrol</td>
                                    <td>petrol</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Max Power (bhp@rpm)</td>
                                    <td>652 @ 8000</td>
                                    <td>987 @ 6000</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Max Torque (Nm@rpm)</td>
                                    <td>683 @ 6000</td>
                                    <td>1250 @ 2200</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Mileage (ARAI) (kmpl)</td>
                                    <td>8</td>
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Alternate Fuel</td>
                                    <td>Not Applicable</td>
                                    <td>Not Applicable</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Transmission Type</td>
                                    <td>Automatic</td>
                                    <td>Automatic</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>No of Gears</td>
                                    <td>7</td>
                                    <td>7</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Air Conditioner</td>
                                    <td>Automatic Climate Control</td>
                                    <td>Automatic Climate Control</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Power Windows</td>
                                    <td>Front & Rear</td>
                                    <td>Front & Rear</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Central Locking</td>
                                    <td>Remote</td>
                                    <td>Remote With Boot Opener</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Anti-Lock Braking System </td>
                                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Airbags</td>
                                    <td>4 (Driver, Co-Driver & <br> Rear Passengers)</td>
                                    <td>8 Airbags</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Seat Upholstery</td>
                                    <td>Leather</td>
                                    <td>Leather</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
