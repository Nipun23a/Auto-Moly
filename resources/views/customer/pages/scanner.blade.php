@extends('customer.layouts.app')
@section('content')
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Car Diagnostic System</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Car Diagnostic</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="impl_sell_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Get Car Problems & Solutions</h1>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="diagnostic_form_section">
                        <div class="impl_step">
                            <h2 class="step-title">Car Details</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input id="car_model" type="text" name="car_model" class="form-control required" placeholder="CAR MODEL (e.g. Toyota Corolla)">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input id="manufacture_year" type="number" name="manufacture_year" class="form-control required number" placeholder="MANUFACTURE YEAR (e.g. 2015)">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 text-center">
                                    <button id="diagnoseBtn" class="impl_btn">Diagnose Car</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Results Section (Initially Hidden) -->
                    <div id="diagnostic_results" class="diagnostic_results" style="display: none;">
                        <div class="impl_step">
                            <h2 class="step-title">Diagnostic Results</h2>

                            <!-- Vehicle Information -->
                            <div class="vehicle_info_section">
                                <h3>Vehicle Information</h3>
                                <div class="vehicle_info_card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="info_item">
                                                <span class="info_label" style="color: white">Car Model:</span>
                                                <span id="result_car_model" class="info_value">Toyota Corolla</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="info_item">
                                                <span class="info_label">Manufacture Year:</span>
                                                <span id="result_year" class="info_value">2015</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="info_item">
                                                <span class="info_label">Vehicle Age:</span>
                                                <span id="result_age" class="info_value">10 Years</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Most Likely Problem & Solution -->
                            <div class="diagnosis_summary">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="diagnosis_card problem_card">
                                            <h4>Most Likely Problem</h4>
                                            <p id="most_likely_problem">Cloudy headlights</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="diagnosis_card solution_card">
                                            <h4>Recommended Solution</h4>
                                            <p id="most_likely_solution">Headlight restoration</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Potential Problems & Solutions -->
                            <div class="detailed_diagnosis">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="impl_fea_car_data">
                                            <h4>Potential Problems</h4>
                                            <ul id="potential_problems_list" class="diagnosis_list">
                                                <!-- Will be populated dynamically -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="impl_fea_car_data">
                                            <h4>Potential Solutions</h4>
                                            <ul id="potential_solutions_list" class="diagnosis_list">
                                                <!-- Will be populated dynamically -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        .diagnostic_form_section {
            padding: 30px;
            border-radius: 5px;
            margin-bottom: 40px;
        }

        .diagnostic_results {
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-top: 40px;
        }

        .vehicle_info_card {
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .info_item {
            margin-bottom: 10px;
        }

        .info_label {
            font-weight: bold;
            color: white;
        }

        .info_value {
            font-weight: 600;
            color: white;
            margin-left: 10px;
        }

        .diagnosis_card {
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 30px;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .diagnosis_card h4 {
            margin-bottom: 15px;
            font-weight: 600;
        }

        .diagnosis_card p {
            font-size: 18px;
            font-weight: 500;
        }

        .problem_card {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .solution_card {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .diagnosis_list {
            list-style: none;
            padding: 0;
        }

        .diagnosis_list li {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
        }

        .diagnosis_list li .problem,
        .diagnosis_list li .solution {
            font-weight: 500;
        }

        .diagnosis_list li .probability {
            background-color: #007bff;
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .impl_btn {
            background-color: #2c3e50;
            color: #fff;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            margin-top: 20px;
        }

        .impl_btn:hover {
            background-color: #1a252f;
        }

        .vehicle_info_section h3,
        .detailed_diagnosis h4 {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
    </style>

    <!-- JavaScript for API Integration -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const diagnoseBtn = document.getElementById('diagnoseBtn');

            diagnoseBtn.addEventListener('click', function() {
                const carModel = document.getElementById('car_model').value.trim();
                const manufactureYear = document.getElementById('manufacture_year').value.trim();

                // Basic validation
                if (!carModel || !manufactureYear) {
                    alert('Please enter both car model and manufacture year');
                    return;
                }

                // Show loading state
                diagnoseBtn.textContent = 'Processing...';
                diagnoseBtn.disabled = true;

                // Prepare data for API
                const data = {
                    car_model: carModel,
                    manufacture_year: parseInt(manufactureYear)
                };

                // Call API
                fetch('http://localhost:5000/predict', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Display results
                        displayResults(data);

                        // Reset button state
                        diagnoseBtn.textContent = 'Diagnose Car';
                        diagnoseBtn.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error fetching diagnostic data. Please try again.');

                        // Reset button state
                        diagnoseBtn.textContent = 'Diagnose Car';
                        diagnoseBtn.disabled = false;
                    });
            });

            function displayResults(data) {
                // Show results section
                document.getElementById('diagnostic_results').style.display = 'block';

                // Populate vehicle info
                document.getElementById('result_car_model').textContent = data.vehicle_info.car_model;
                document.getElementById('result_year').textContent = data.vehicle_info.manufacture_year;
                document.getElementById('result_age').textContent = data.vehicle_info.vehicle_age + ' Years';

                // Populate most likely problem and solution
                document.getElementById('most_likely_problem').textContent = data.most_likely_problem;
                document.getElementById('most_likely_solution').textContent = data.most_likely_solution;

                // Populate potential problems list
                const problemsList = document.getElementById('potential_problems_list');
                problemsList.innerHTML = '';
                data.potential_problems.forEach(problem => {
                    const li = document.createElement('li');
                    li.innerHTML = `
                        <span class="problem">${problem.problem}</span>
                        <span class="probability">${Math.round(problem.probability)}%</span>
                    `;
                    problemsList.appendChild(li);
                });

                // Populate potential solutions list
                const solutionsList = document.getElementById('potential_solutions_list');
                solutionsList.innerHTML = '';
                data.potential_solutions.forEach(solution => {
                    const li = document.createElement('li');
                    li.innerHTML = `
                        <span class="solution">${solution.solution}</span>
                        <span class="probability">${Math.round(solution.probability)}%</span>
                    `;
                    solutionsList.appendChild(li);
                });

                // Scroll to results
                document.getElementById('diagnostic_results').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>
@endsection
