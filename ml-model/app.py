from flask import Flask, request, jsonify
import pandas as pd
import numpy as np
import joblib
import os
import re
from werkzeug.exceptions import BadRequest
from flask_cors import CORS

app = Flask(__name__)
CORS(app)


# Function to check if models exist
def check_models():
    required_files = [
        'models/problem_model.pkl',
        'models/solution_model.pkl',
        'models/problem_encoder.pkl',
        'models/solution_encoder.pkl',
        'models/ground_clearance_model.pkl',
        'models/fuel_consumption_model.pkl',
        'car_price_prediction_model.joblib',
    ]

    missing_files = [f for f in required_files if not os.path.exists(f)]

    if missing_files:
        return False, f"Missing model files: {', '.join(missing_files)}"
    return True, "All models loaded successfully"


def preprocess_input(data):
    # Extract the number from cylinders if it's a string
    if 'cylinders' in data and isinstance(data['cylinders'], str):
        match = re.search(r'(\d+)', data['cylinders'])
        if match:
            data['cylinders'] = float(match.group(1))

    # Calculate car age
    if 'year' in data:
        current_year = 2025  # Update as needed
        data['car_age'] = current_year - data['year']

    # Calculate price_per_mile if odometer is provided
    if 'odometer' in data:
        # This won't be used for prediction but can be calculated for info
        data['price_per_mile'] = None  # Will be filled after prediction

    return data


def predict_car_price(data):
    try:
        # Load the trained model
        model = joblib.load('car_price_prediction_model.joblib')

        # Preprocess input data
        processed_data = preprocess_input(data)

        # Create a dataframe for prediction with required columns
        prediction_df = pd.DataFrame([processed_data])

        # Drop columns not needed for prediction
        if 'price_per_mile' in prediction_df.columns:
            prediction_df.drop(columns=['price_per_mile'], inplace=True, errors='ignore')

        # Make prediction
        predicted_price = model.predict(prediction_df)[0]

        # Round the price to nearest 10
        predicted_price = round(predicted_price / 10) * 10

        # Add confidence intervals (estimated)
        price_range_low = round((predicted_price * 0.85) / 10) * 10
        price_range_high = round((predicted_price * 1.15) / 10) * 10

        # If odometer was provided, calculate price per mile
        price_per_mile = None
        if 'odometer' in data and data['odometer'] > 0:
            price_per_mile = round(predicted_price / data['odometer'], 2)

        return {
            'predicted_price': float(predicted_price),
            'price_range_low': float(price_range_low),
            'price_range_high': float(price_range_high),
            'price_per_mile': price_per_mile,
            'confidence': 'medium'  # Can be enhanced with actual confidence metrics
        }
    except Exception as e:
        raise Exception(f"Error making prediction: {str(e)}")

# Function to make predictions
def predict_vehicle_metrics(car_model, manufacture_year):
    try:
        # Load the trained models
        ground_clearance_model = joblib.load('models/ground_clearance_model.pkl')
        fuel_consumption_model = joblib.load('models/fuel_consumption_model.pkl')

        # Calculate vehicle age
        current_year = 2025  # You can update this or use datetime.now().year
        vehicle_age = current_year - manufacture_year

        # Create a dataframe for prediction - removed city, state, and service history
        prediction_df = pd.DataFrame({
            'VEHICAL COMPANY': [car_model],
            'MANUFACTURE_YEAR': [manufacture_year],
            'VEHICLE_AGE': [vehicle_age]
        })

        # Make predictions
        ground_clearance_prediction = float(ground_clearance_model.predict(prediction_df)[0])
        fuel_consumption_prediction = float(fuel_consumption_model.predict(prediction_df)[0])

        # Return predictions
        return {
            'ground_clearance': ground_clearance_prediction,
            'fuel_consumption': fuel_consumption_prediction
        }
    except Exception as e:
        raise Exception(f"Error predicting vehicle metrics: {str(e)}")

def predict_issues_and_solutions(car_model, manufacture_year):
    try:
        # Load the trained models and encoders
        problem_model = joblib.load('models/problem_model.pkl')
        solution_model = joblib.load('models/solution_model.pkl')
        problem_encoder = joblib.load('models/problem_encoder.pkl')
        solution_encoder = joblib.load('models/solution_encoder.pkl')

        # Calculate vehicle age
        current_year = 2025  # Update as needed
        vehicle_age = current_year - manufacture_year

        # Create a dataframe for prediction
        prediction_df = pd.DataFrame({
            'VEHICAL COMPANY': [car_model],
            'MANUFACTURE_YEAR': [manufacture_year],
            'VEHICLE_AGE': [vehicle_age]
        })

        # Make predictions
        problem_prediction = problem_model.predict(prediction_df)[0]
        solution_prediction = solution_model.predict(prediction_df)[0]

        # Get the probabilities to find potential future issues
        problem_probs = problem_model.predict_proba(prediction_df)[0]
        solution_probs = solution_model.predict_proba(prediction_df)[0]

        # Get the top 3 most likely problems and solutions
        top_problem_indices = np.argsort(problem_probs)[::-1][:3]
        top_solution_indices = np.argsort(solution_probs)[::-1][:3]

        top_problems = [
            {
                "problem": problem_encoder.inverse_transform([idx])[0],
                "probability": float(problem_probs[idx] * 100)
            }
            for idx in top_problem_indices
        ]

        top_solutions = [
            {
                "solution": solution_encoder.inverse_transform([idx])[0],
                "probability": float(solution_probs[idx] * 100)
            }
            for idx in top_solution_indices
        ]

        # Return most likely problem and solution along with top potential issues
        return {
            'most_likely_problem': problem_encoder.inverse_transform([problem_prediction])[0],
            'most_likely_solution': solution_encoder.inverse_transform([solution_prediction])[0],
            'potential_problems': top_problems,
            'potential_solutions': top_solutions
        }
    except Exception as e:
        raise Exception(f"Error making prediction: {str(e)}")


@app.route('/')
def home():
    return """
    <h1>Car Problem and Price Prediction API</h1>
    <p>Send POST requests to /predict with JSON data containing car_model and manufacture_year.</p>
    <p>Example: {"car_model": "Maruti Suzuki", "manufacture_year": 2018}</p>
    <p>Example: {
        "year": 2018,
        "manufacturer": "Toyota",
        "model": "Camry",
        "condition": "good",
        "cylinders": "4 cylinders",
        "fuel": "gas",
        "odometer": 50000,
        "title_status": "clean",
        "transmission": "automatic",
        "drive": "fwd",
        "type": "sedan",
        "paint_color": "black"
    }</p>
    """


@app.route('/health', methods=['GET'])
def health_check():
    models_ok, message = check_models()
    if models_ok:
        return jsonify({
            'status': 'healthy',
            'message': message
        }), 200
    else:
        return jsonify({
            'status': 'unhealthy',
            'message': message
        }), 500


@app.route('/predict', methods=['POST'])
def predict():
    try:
        # Check if models are available
        models_ok, message = check_models()
        if not models_ok:
            return jsonify({
                'error': 'Model files not found',
                'details': message
            }), 500

        # Get JSON data from request
        data = request.get_json()

        # Validate input data
        if not data or 'car_model' not in data or 'manufacture_year' not in data:
            return jsonify({
                'error': 'Missing required fields',
                'required': ['car_model', 'manufacture_year']
            }), 400

        car_model = data['car_model']

        try:
            manufacture_year = int(data['manufacture_year'])
        except (ValueError, TypeError):
            return jsonify({
                'error': 'Invalid manufacture_year',
                'message': 'manufacture_year must be a valid integer'
            }), 400

        # Make predictions for issues and solutions
        prediction_result = predict_issues_and_solutions(car_model, manufacture_year)

        # Make predictions for vehicle metrics
        try:
            vehicle_metrics = predict_vehicle_metrics(car_model, manufacture_year)
            prediction_result.update(vehicle_metrics)
        except Exception as e:
            prediction_result['vehicle_metrics_error'] = str(e)

        # Add vehicle info to response
        prediction_result['vehicle_info'] = {
            'car_model': car_model,
            'manufacture_year': manufacture_year,
            'vehicle_age': 2025 - manufacture_year  # Update current year as needed
        }

        return jsonify(prediction_result), 200

    except BadRequest as e:
        return jsonify({'error': 'Invalid request', 'message': str(e)}), 400
    except Exception as e:
        return jsonify({'error': 'Prediction failed', 'message': str(e)}), 500

@app.route('/price',methods=['POST'])
def price():
    try:
        # Check if model is available
        model_ok, message = check_models()
        if not model_ok:
            return jsonify({
                'error': 'Model file not found',
                'details': message
            }), 500

        # Get JSON data from request
        data = request.get_json()

        # Validate input data
        if not data:
            return jsonify({
                'error': 'Missing request data',
                'message': 'Request body must contain JSON data'
            }), 400

        # Ensure required fields are present
        required_fields = ['year', 'manufacturer', 'model', 'condition', 'odometer']
        missing_fields = [field for field in required_fields if field not in data]
        if missing_fields:
            return jsonify({
                'error': 'Missing required fields',
                'required': required_fields,
                'missing': missing_fields
            }), 400

        # Type checking
        try:
            data['year'] = int(data['year'])
            data['odometer'] = float(data['odometer'])
            if 'cylinders' in data and isinstance(data['cylinders'], (int, float)):
                data['cylinders'] = float(data['cylinders'])
        except (ValueError, TypeError):
            return jsonify({
                'error': 'Invalid data types',
                'message': 'year must be integer, odometer and cylinders must be numeric'
            }), 400

        # Make prediction
        prediction_result = predict_car_price(data)

        # Add vehicle info to response
        prediction_result['vehicle_info'] = {
            'year': data['year'],
            'manufacturer': data['manufacturer'],
            'model': data['model'],
            'condition': data['condition'],
            'odometer': data['odometer'],
            'car_age': 2025 - data['year']  # Update current year as needed
        }

        # Add optional fields if present
        optional_fields = ['cylinders', 'fuel', 'title_status', 'transmission', 'drive', 'type', 'paint_color']
        for field in optional_fields:
            if field in data:
                prediction_result['vehicle_info'][field] = data[field]

        return jsonify(prediction_result), 200

    except BadRequest as e:
        return jsonify({'error': 'Invalid request', 'message': str(e)}), 400
    except Exception as e:
        return jsonify({'error': 'Prediction failed', 'message': str(e)}), 500


@app.route('/supported_values', methods=['GET'])
def supported_values():
    try:
        model = joblib.load('car_price_prediction_model.joblib')
        preprocessor = model.named_steps['preprocessor']

        supported_values = {}
        for name, transformer, columns in preprocessor.transformers_:
            if name == 'cat':
                for column in columns:
                    try:
                        if hasattr(transformer, 'categories_'):
                            supported_values[column] = transformer.categories_[columns.index(column)].tolist()
                        elif hasattr(transformer.named_steps['onehot'], 'categories_'):
                            supported_values[column] = transformer.named_steps['onehot'].categories_[
                                columns.index(column)].tolist()
                    except (AttributeError, IndexError):
                        pass

        return jsonify(supported_values), 200
    except Exception as e:
        return jsonify({'error': 'Failed to get supported values', 'message': str(e)}), 500


if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
