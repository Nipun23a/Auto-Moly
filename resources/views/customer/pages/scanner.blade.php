@extends('customer.layouts.app')
@section('content')
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>vehicle information</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">vehicle information</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Car Info wrapper  Start ------>
    <div class="impl_sell_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form id="impl_sform" action="#">
                        <div class="impl_steps_wrapper">
                            <section>
                                <div class="impl_step">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <select id="carBrand" class="form-control required">
                                                    <option data-display="Select Brand">Select Brand</option>
                                                    <option value="toyota">Toyota</option>
                                                    <option value="honda">Honda</option>
                                                    <option value="ford">Ford</option>
                                                    <option value="bmw">BMW</option>
                                                    <option value="mercedes">Mercedes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="carModel" type="text" name="model" class="form-control required" placeholder="CAR MODEL">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="carYear" type="text" name="year" class="form-control required number" placeholder="YEAR">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input id="carMileage" type="text" name="meter" class="form-control required" placeholder="KILOMETERS DRIVEN">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <select id="carPrice" class="form-control required">
                                                    <option data-display="Select Price Range">Select Price Range</option>
                                                    <option value="budget">Budget ($0-$15,000)</option>
                                                    <option value="midrange">Mid-Range ($15,001-$30,000)</option>
                                                    <option value="luxury">Luxury ($30,001+)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="compare_btn text-center">
                                                <button type="button" id="checkCarBtn" class="impl_btn">Get Information</button>
                                                <button type="reset" class="impl_btn">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!------ Car Information Results ------>
    <div class="impl_compare_wrapper" id="carInfoResults" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1 id="carTitleDisplay">vehicle information</h1>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">Vehicle Details</h2>
                        <div class="compare_img">
                            <img src="http://via.placeholder.com/200x180" alt="" class="img-fluid" />
                        </div>
                        <div class="car_basic_info mt-3">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Brand:</td>
                                    <td id="brandDisplay">-</td>
                                </tr>
                                <tr>
                                    <td>Model:</td>
                                    <td id="modelDisplay">-</td>
                                </tr>
                                <tr>
                                    <td>Year:</td>
                                    <td id="yearDisplay">-</td>
                                </tr>
                                <tr>
                                    <td>Body Type:</td>
                                    <td id="bodyTypeDisplay">-</td>
                                </tr>
                                <tr>
                                    <td>Engine:</td>
                                    <td id="engineDisplay">-</td>
                                </tr>
                                <tr>
                                    <td>Fuel Economy:</td>
                                    <td id="fuelEconomyDisplay">-</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">Reliability Information</h2>
                        <div class="mt-3 mb-4">
                            <h5>Reliability Score</h5>
                            <div class="progress">
                                <div id="reliabilityBar" class="progress-bar bg-success" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                            </div>
                        </div>

                        <div class="car_stats">
                            <div class="row">
                                <div class="col-md-4 text-center mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-tachometer-alt"></i> Avg. Lifespan</h5>
                                            <p id="lifespanDisplay" class="card-text">200,000 miles</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-tools"></i> Common Repair Age</h5>
                                            <p id="repairAgeDisplay" class="card-text">5-7 years</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-dollar-sign"></i> Annual Maintenance</h5>
                                            <p id="maintenanceDisplay" class="card-text">$450</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mt-4">
                    <div class="impl_heading">
                        <h1>common issues</h1>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="compare_table_wrapper">
                        <div class="compare_list_option">
                            <label class="compare_check_label">
                                Hide Low Severity Issues
                                <input type="checkbox" id="hideLowSeverity" name="check">
                                <span class="label-text"></span>
                            </label>
                            <label class="compare_check_label">
                                Highlight Critical Issues
                                <input type="checkbox" id="highlightCritical" name="check">
                                <span class="label-text"></span>
                            </label>
                        </div>
                        <div class="compare_table">
                            <table class="table table-bordered" id="issuesTable">
                                <thead>
                                <tr>
                                    <th>Issue</th>
                                    <th>Severity</th>
                                    <th>Description</th>
                                    <th>Typical Cost</th>
                                </tr>
                                </thead>
                                <tbody id="issuesTableBody">
                                <!-- Issues will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mt-4">
                    <div class="impl_heading">
                        <h1>recall information</h1>
                    </div>
                    <div id="recallsContainer" class="mb-5">
                        <!-- Recalls will be added dynamically -->
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>compare with similar vehicles</h1>
                    </div>
                </div>

                <div class="col-lg-12 col-md-">
                    <div class="compare_table_wrapper">
                        <div class="compare_table">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Overview</th>
                                    <th id="compareModel1">Your Vehicle</th>
                                    <th>Alternative 1</th>
                                    <th>Alternative 2</th>
                                </tr>
                                </thead>
                                <tr class="bg_color">
                                    <td>Price Range</td>
                                    <td id="comparePrice1">$25,000 - $28,000</td>
                                    <td>$23,000 - $26,000</td>
                                    <td>$27,000 - $30,000</td>
                                </tr>
                                <tr>
                                    <td>Reliability Score</td>
                                    <td id="compareReliability1">85/100</td>
                                    <td>80/100</td>
                                    <td>90/100</td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Fuel Economy</td>
                                    <td id="compareFuel1">25 MPG</td>
                                    <td>28 MPG</td>
                                    <td>23 MPG</td>
                                </tr>
                                <tr>
                                    <td>Maintenance Cost</td>
                                    <td id="compareMaintenance1">$450/year</td>
                                    <td>$480/year</td>
                                    <td>$400/year</td>
                                </tr>
                                <tr class="bg_color">
                                    <td>Common Issues</td>
                                    <td id="compareIssues1">3 major issues</td>
                                    <td>4 major issues</td>
                                    <td>2 major issues</td>
                                </tr>
                                <tr>
                                    <td>Average Lifespan</td>
                                    <td id="compareLifespan1">200,000 miles</td>
                                    <td>180,000 miles</td>
                                    <td>220,000 miles</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Sample car database (in a real app, this would come from a server)
            const carDatabase = {
                toyota: {
                    camry: {
                        info: {
                            bodyType: "Sedan",
                            engine: "2.5L 4-cylinder",
                            fuelEconomy: "28 city / 39 highway MPG",
                            lifespan: "200,000+ miles",
                            repairAge: "6-8 years",
                            maintenance: "$420/year"
                        },
                        issues: [
                            {title: "Excessive oil consumption", severity: "medium", description: "2010-2014 models may consume oil at higher than normal rates.", cost: "$800-$1200"},
                            {title: "Transmission hesitation", severity: "low", description: "Some models experience slight delay when shifting gears.", cost: "$300-$500"},
                            {title: "Power steering issues", severity: "low", description: "Electric power steering may fail in older models.", cost: "$800-$1500"}
                        ],
                        recalls: ["Recall #2019-233: Fuel pump may fail in 2018-2019 models"]
                    },
                    corolla: {
                        info: {
                            bodyType: "Compact Sedan",
                            engine: "1.8L 4-cylinder",
                            fuelEconomy: "31 city / 40 highway MPG",
                            lifespan: "250,000+ miles",
                            repairAge: "7-9 years",
                            maintenance: "$350/year"
                        },
                        issues: [
                            {title: "CVT transmission issues", severity: "medium", description: "2014-2018 models may experience premature CVT failure.", cost: "$3500-$4500"},
                            {title: "A/C system failures", severity: "low", description: "Air conditioning components may fail after 6-8 years.", cost: "$600-$1200"}
                        ],
                        recalls: ["Recall #2020-156: Airbag sensor may malfunction in 2017-2019 models"]
                    }
                },
                honda: {
                    accord: {
                        info: {
                            bodyType: "Mid-size Sedan",
                            engine: "1.5L Turbo 4-cylinder",
                            fuelEconomy: "30 city / 38 highway MPG",
                            lifespan: "220,000+ miles",
                            repairAge: "5-7 years",
                            maintenance: "$400/year"
                        },
                        issues: [
                            {title: "Oil dilution problems", severity: "high", description: "2016-2018 models with 1.5L turbo engine may experience fuel mixing with oil.", cost: "$500-$1000"},
                            {title: "Infotainment system glitches", severity: "low", description: "Screen freezing and connectivity issues reported in models with Display Audio system.", cost: "$300-$800"}
                        ],
                        recalls: ["Recall #2021-067: Fuel pump failure risk in 2018-2020 models"]
                    },
                    civic: {
                        info: {
                            bodyType: "Compact Sedan/Hatchback",
                            engine: "2.0L 4-cylinder",
                            fuelEconomy: "32 city / 42 highway MPG",
                            lifespan: "200,000+ miles",
                            repairAge: "6-8 years",
                            maintenance: "$380/year"
                        },
                        issues: [
                            {title: "AC condenser failures", severity: "medium", description: "2016-2018 models prone to AC condenser cracks and leaks.", cost: "$500-$900"},
                            {title: "Engine rattling at cold start", severity: "low", description: "Some 10th generation models experience noise at startup in cold weather.", cost: "$150-$400"}
                        ],
                        recalls: ["Recall #2022-112: Drive shaft may separate in 2020-2022 models"]
                    }
                },
                ford: {
                    fusion: {
                        info: {
                            bodyType: "Mid-size Sedan",
                            engine: "2.0L EcoBoost 4-cylinder",
                            fuelEconomy: "21 city / 31 highway MPG",
                            lifespan: "180,000+ miles",
                            repairAge: "5-7 years",
                            maintenance: "$550/year"
                        },
                        issues: [
                            {title: "Steering control module failure", severity: "high", description: "Loss of power steering assistance reported in 2010-2012 models.", cost: "$1000-$1500"},
                            {title: "Transmission shifting issues", severity: "medium", description: "Hard shifting and hesitation in 6-speed automatic transmissions.", cost: "$600-$2000"},
                            {title: "Water pump failures", severity: "medium", description: "Internal coolant leak can damage engine in 1.5L and 2.0L EcoBoost engines.", cost: "$800-$1600"}
                        ],
                        recalls: ["Recall #2018-055: Steering wheel may detach in 2014-2018 models"]
                    }
                },
                bmw: {
                    "3 series": {
                        info: {
                            bodyType: "Compact Luxury Sedan",
                            engine: "2.0L Turbo 4-cylinder",
                            fuelEconomy: "26 city / 36 highway MPG",
                            lifespan: "150,000+ miles",
                            repairAge: "4-6 years",
                            maintenance: "$800/year"
                        },
                        issues: [
                            {title: "Electric water pump failure", severity: "high", description: "Sudden overheating due to water pump failure common in models from 2006-2013.", cost: "$800-$1200"},
                            {title: "Oil leaks", severity: "medium", description: "Valve cover and oil filter housing gaskets tend to leak after 60,000 miles.", cost: "$600-$1200"},
                            {title: "VANOS solenoid issues", severity: "medium", description: "Rough idle and reduced performance due to solenoid failures.", cost: "$400-$800"}
                        ],
                        recalls: ["Recall #2022-033: Brake assist system may fail in 2019-2021 models"]
                    }
                }
                // Add more brands and models as needed
            };

            // Handle form submission
            $("#checkCarBtn").click(function() {
                const brand = $("#carBrand").val();
                const model = $("#carModel").val().toLowerCase();
                const year = $("#carYear").val();
                const price = $("#carPrice").val();

                // Basic validation
                if (!brand || !model || !year) {
                    alert("Please fill in all required fields");
                    return;
                }

                // Check if we have this car in our database
                if (carDatabase[brand] && carDatabase[brand][model]) {
                    const carData = carDatabase[brand][model];

                    // Update the display with car information
                    $("#carTitleDisplay").text(`${brand.toUpperCase()} ${model.toUpperCase()} (${year})`);
                    $("#brandDisplay").text(brand.toUpperCase());
                    $("#modelDisplay").text(model.toUpperCase());
                    $("#yearDisplay").text(year);

                    // Update car details
                    $("#bodyTypeDisplay").text(carData.info.bodyType);
                    $("#engineDisplay").text(carData.info.engine);
                    $("#fuelEconomyDisplay").text(carData.info.fuelEconomy);

                    // Update stats
                    $("#lifespanDisplay").text(carData.info.lifespan);
                    $("#repairAgeDisplay").text(carData.info.repairAge);
                    $("#maintenanceDisplay").text(carData.info.maintenance);

                    // Update reliability based on year (simulated calculation)
                    const age = 2025 - parseInt(year);
                    let reliabilityScore = 100 - (age * 2);
                    if (reliabilityScore < 0) reliabilityScore = 0;

                    // Update reliability bar
                    $("#reliabilityBar").css("width", reliabilityScore + "%");
                    $("#reliabilityBar").text(reliabilityScore + "%");

                    // Update color based on score
                    if (reliabilityScore > 70) {
                        $("#reliabilityBar").removeClass("bg-warning bg-danger").addClass("bg-success");
                    } else if (reliabilityScore > 40) {
                        $("#reliabilityBar").removeClass("bg-success bg-danger").addClass("bg-warning");
                    } else {
                        $("#reliabilityBar").removeClass("bg-success bg-warning").addClass("bg-danger");
                    }

                    // Update issues table
                    $("#issuesTableBody").empty();
                    carData.issues.forEach(issue => {
                        const severityClass = getSeverityClass(issue.severity);
                        const issueRow = `
                            <tr class="${issue.severity === 'high' ? 'table-danger' : ''}">
                                <td>${issue.title}</td>
                                <td><span class="badge ${severityClass}">${capitalize(issue.severity)}</span></td>
                                <td>${issue.description}</td>
                                <td>${issue.cost}</td>
                            </tr>
                        `;
                        $("#issuesTableBody").append(issueRow);
                    });

                    // Update recalls
                    $("#recallsContainer").empty();
                    if (carData.recalls && carData.recalls.length > 0) {
                        carData.recalls.forEach(recall => {
                            $("#recallsContainer").append(`
                                <div class="alert alert-warning">
                                    <strong>${recall}</strong>
                                </div>
                            `);
                        });
                    } else {
                        $("#recallsContainer").append(`
                            <div class="alert alert-success">
                                <strong>No recalls found for this vehicle.</strong>
                            </div>
                        `);
                    }

                    // Update comparison table
                    $("#compareModel1").text(`${brand.toUpperCase()} ${model.toUpperCase()} (${year})`);
                    $("#comparePrice1").text(getPriceRangeText(price));
                    $("#compareReliability1").text(`${reliabilityScore}/100`);
                    $("#compareFuel1").text(carData.info.fuelEconomy.split('/')[1].trim());
                    $("#compareMaintenance1").text(carData.info.maintenance);
                    $("#compareIssues1").text(`${carData.issues.length} issues identified`);
                    $("#compareLifespan1").text(carData.info.lifespan);

                    // Show the results section
                    $("#carInfoResults").fadeIn();

                    // Scroll to results
                    $('html, body').animate({
                        scrollTop: $("#carInfoResults").offset().top
                    }, 800);

                } else {
                    alert("Sorry, we don't have information for this specific vehicle yet.");
                }
            });

            // Toggle low severity issues
            $("#hideLowSeverity").change(function() {
                if(this.checked) {
                    $("tr").each(function() {
                        if($(this).find("span.badge").text() === "Low") {
                            $(this).hide();
                        }
                    });
                } else {
                    $("tr").each(function() {
                        $(this).show();
                    });
                }
            });

            // Highlight critical issues
            $("#highlightCritical").change(function() {
                if(this.checked) {
                    $("tr").each(function() {
                        if($(this).find("span.badge").text() === "High") {
                            $(this).addClass("table-danger");
                        }
                    });
                } else {
                    $("tr").removeClass("table-danger");
                }
            });

            // Helper functions
            function getPriceRangeText(priceRange) {
                switch(priceRange) {
                    case 'budget': return "$0 - $15,000";
                    case 'midrange': return "$15,001 - $30,000";
                    case 'luxury': return "$30,001+";
                    default: return "Not specified";
                }
            }

            function getSeverityClass(severity) {
                switch(severity) {
                    case 'high': return 'badge-danger';
                    case 'medium': return 'badge-warning';
                    case 'low': return 'badge-info';
                    default: return 'badge-secondary';
                }
            }

            function capitalize(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        });
    </script>
@endsection
