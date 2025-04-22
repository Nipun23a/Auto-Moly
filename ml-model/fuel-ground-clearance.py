import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import OneHotEncoder
from sklearn.ensemble import RandomForestRegressor
from sklearn.pipeline import Pipeline
from sklearn.compose import ColumnTransformer
import joblib
import warnings

warnings.filterwarnings('ignore')


# Function to load and prepare the data
def load_data(file_path):
    try:
        # Load the CSV file
        df = pd.read_csv(file_path)
        print(f"Data loaded successfully with {df.shape[0]} rows and {df.shape[1]} columns.")
        print(df.head())
        return df
    except Exception as e:
        print(f"Error loading data: {e}")
        return None


# Function to preprocess the data
def preprocess_data(df):
    # Convert MANUFACTURE_YEAR to numeric if not already
    df['MANUFACTURE_YEAR'] = pd.to_numeric(df['MANUFACTURE_YEAR'], errors='coerce')

    # Calculate vehicle age
    current_year = 2025  # You can update this or use datetime.now().year
    df['VEHICLE_AGE'] = current_year - df['MANUFACTURE_YEAR']

    # Extract features and targets - REMOVED city, state, and service history
    X = df[['VEHICAL COMPANY', 'MANUFACTURE_YEAR', 'VEHICLE_AGE']]
    y_ground_clearance = df['GROUND_CLEARANCE']
    y_fuel_consumption = df['FUEL_CONSUMPTION']

    return X, y_ground_clearance, y_fuel_consumption


# Function to build and train the models
def build_models(X, y_ground_clearance, y_fuel_consumption):
    # Define categorical columns - REMOVED city, state, and service history
    categorical_features = ['VEHICAL COMPANY']

    # Define preprocessing steps
    preprocessor = ColumnTransformer(
        transformers=[
            ('cat', OneHotEncoder(handle_unknown='ignore'), categorical_features),
        ],
        remainder='passthrough'
    )

    # Create pipelines for ground clearance and fuel consumption prediction
    ground_clearance_pipeline = Pipeline([
        ('preprocessor', preprocessor),
        ('regressor', RandomForestRegressor(n_estimators=100, random_state=42))
    ])

    fuel_consumption_pipeline = Pipeline([
        ('preprocessor', preprocessor),
        ('regressor', RandomForestRegressor(n_estimators=100, random_state=42))
    ])

    # Train the models
    ground_clearance_pipeline.fit(X, y_ground_clearance)
    fuel_consumption_pipeline.fit(X, y_fuel_consumption)

    # Save the models
    joblib.dump(ground_clearance_pipeline, 'models/ground_clearance_model.pkl')
    joblib.dump(fuel_consumption_pipeline, 'models/fuel_consumption_model.pkl')

    return ground_clearance_pipeline, fuel_consumption_pipeline


# Function to make predictions
def predict_vehicle_metrics(car_model, manufacture_year):
    try:
        # Load the trained models
        ground_clearance_model = joblib.load('models/ground_clearance_model.pkl')
        fuel_consumption_model = joblib.load('models/fuel_consumption_model.pkl')

        # Calculate vehicle age
        current_year = 2025  # You can update this or use datetime.now().year
        vehicle_age = current_year - manufacture_year

        # Create a dataframe for prediction - REMOVED city, state, and service history
        prediction_df = pd.DataFrame({
            'VEHICAL COMPANY': [car_model],
            'MANUFACTURE_YEAR': [manufacture_year],
            'VEHICLE_AGE': [vehicle_age]
        })

        # Make predictions
        ground_clearance_prediction = ground_clearance_model.predict(prediction_df)[0]
        fuel_consumption_prediction = fuel_consumption_model.predict(prediction_df)[0]

        # Return predictions
        return {
            'ground_clearance': ground_clearance_prediction,
            'fuel_consumption': fuel_consumption_prediction
        }
    except Exception as e:
        print(f"Error making prediction: {e}")
        return None


# Function to evaluate model performance
def evaluate_models(X, y_ground_clearance, y_fuel_consumption, ground_clearance_model, fuel_consumption_model):
    # Split data for evaluation
    X_train, X_test, y_gc_train, y_gc_test, y_fc_train, y_fc_test = train_test_split(
        X, y_ground_clearance, y_fuel_consumption, test_size=0.2, random_state=42
    )

    # Train models on training data
    ground_clearance_model.fit(X_train, y_gc_train)
    fuel_consumption_model.fit(X_train, y_fc_train)

    # Make predictions on test data
    gc_pred = ground_clearance_model.predict(X_test)
    fc_pred = fuel_consumption_model.predict(X_test)

    # Calculate metrics
    from sklearn.metrics import mean_squared_error, r2_score

    gc_mse = mean_squared_error(y_gc_test, gc_pred)
    gc_r2 = r2_score(y_gc_test, gc_pred)

    fc_mse = mean_squared_error(y_fc_test, fc_pred)
    fc_r2 = r2_score(y_fc_test, fc_pred)

    print("\nModel Evaluation Results:")
    print(f"Ground Clearance Model - MSE: {gc_mse:.2f}, R²: {gc_r2:.2f}")
    print(f"Fuel Consumption Model - MSE: {fc_mse:.2f}, R²: {fc_r2:.2f}")

    return {
        'ground_clearance': {'mse': gc_mse, 'r2': gc_r2},
        'fuel_consumption': {'mse': fc_mse, 'r2': fc_r2}
    }


# Main function to run the entire process
def main():
    # Create models directory if it doesn't exist
    import os
    if not os.path.exists('models'):
        os.makedirs('models')

    file_path = 'vehicle_data_with_specs.csv'  # Update with your actual file name

    # Load and preprocess data
    df = load_data(file_path)
    if df is not None:
        X, y_ground_clearance, y_fuel_consumption = preprocess_data(df)

        # Build and train the models
        ground_clearance_model, fuel_consumption_model = build_models(X, y_ground_clearance, y_fuel_consumption)

        # Evaluate models
        evaluation_results = evaluate_models(X, y_ground_clearance, y_fuel_consumption,
                                            ground_clearance_model, fuel_consumption_model)

        print("\nModel training completed successfully!")

        # Example prediction for testing
        car_model = "Maruti Suzuki"
        manufacture_year = 2018

        print(f"\nPredicting metrics for a {car_model} manufactured in {manufacture_year}:")
        prediction = predict_vehicle_metrics(car_model, manufacture_year)

        if prediction:
            print(f"\nPredicted Ground Clearance: {prediction['ground_clearance']:.2f} mm")
            print(f"Predicted Fuel Consumption: {prediction['fuel_consumption']:.2f} L/100km")

            # Feature importance analysis - Updated for simplified feature set
            categorical_features = ['VEHICAL COMPANY']
            print("\nFeature Importance for Ground Clearance Prediction:")
            feature_names = (ground_clearance_model.named_steps['preprocessor']
                            .transformers_[0][1].get_feature_names_out(
                input_features=categorical_features).tolist() +
                            ['MANUFACTURE_YEAR', 'VEHICLE_AGE'])

            importances = ground_clearance_model.named_steps['regressor'].feature_importances_
            if len(importances) == len(feature_names):
                for feature, importance in sorted(zip(feature_names, importances),
                                                key=lambda x: x[1], reverse=True)[:5]:
                    print(f"- {feature}: {importance:.4f}")


if __name__ == "__main__":
    main()
