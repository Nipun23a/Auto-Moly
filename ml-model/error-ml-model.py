import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import OneHotEncoder, LabelEncoder
from sklearn.ensemble import RandomForestClassifier
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

    # Extract features and targets
    X = df[['VEHICAL COMPANY', 'MANUFACTURE_YEAR', 'VEHICLE_AGE']]
    y_problems = df['COMMON PROBLEM']
    y_solutions = df['SOLUTION USED']

    # Create label encoders for the targets
    problem_encoder = LabelEncoder()
    solution_encoder = LabelEncoder()

    # Fit the encoders
    y_problems_encoded = problem_encoder.fit_transform(y_problems)
    y_solutions_encoded = solution_encoder.fit_transform(y_solutions)

    # Save the encoders for later use in predictions
    joblib.dump(problem_encoder, 'models/problem_encoder.pkl')
    joblib.dump(solution_encoder, 'models/solution_encoder.pkl')

    return X, y_problems_encoded, y_solutions_encoded, problem_encoder, solution_encoder


# Function to build and train the models
def build_models(X, y_problems, y_solutions):
    # Define preprocessing steps
    preprocessor = ColumnTransformer(
        transformers=[
            ('cat', OneHotEncoder(handle_unknown='ignore'), ['VEHICAL COMPANY']),
        ],
        remainder='passthrough'
    )

    # Create pipelines for problems and solutions prediction
    problem_pipeline = Pipeline([
        ('preprocessor', preprocessor),
        ('classifier', RandomForestClassifier(n_estimators=100, random_state=42))
    ])

    solution_pipeline = Pipeline([
        ('preprocessor', preprocessor),
        ('classifier', RandomForestClassifier(n_estimators=100, random_state=42))
    ])

    # Train the models
    problem_pipeline.fit(X, y_problems)
    solution_pipeline.fit(X, y_solutions)

    # Save the models
    joblib.dump(problem_pipeline, 'models/problem_model.pkl')
    joblib.dump(solution_pipeline, 'models/solution_model.pkl')

    return problem_pipeline, solution_pipeline


# Function to make predictions (for testing the model)
def predict_issues_and_solutions(car_model, manufacture_year):
    try:
        # Load the trained models and encoders
        problem_model = joblib.load('models/problem_model.pkl')
        solution_model = joblib.load('models/solution_model.pkl')
        problem_encoder = joblib.load('models/problem_encoder.pkl')
        solution_encoder = joblib.load('models/solution_encoder.pkl')

        # Calculate vehicle age
        current_year = 2025  # You can update this or use datetime.now().year
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

        top_problems = [(problem_encoder.inverse_transform([idx])[0],
                         problem_probs[idx] * 100) for idx in top_problem_indices]

        top_solutions = [(solution_encoder.inverse_transform([idx])[0],
                          solution_probs[idx] * 100) for idx in top_solution_indices]

        # Return most likely problem and solution along with top potential issues
        return {
            'most_likely_problem': problem_encoder.inverse_transform([problem_prediction])[0],
            'most_likely_solution': solution_encoder.inverse_transform([solution_prediction])[0],
            'potential_problems': top_problems,
            'potential_solutions': top_solutions
        }
    except Exception as e:
        print(f"Error making prediction: {e}")
        return None


# Main function to run the entire process
def main():
    # Create models directory if it doesn't exist
    import os
    if not os.path.exists('models'):
        os.makedirs('models')

    file_path = 'customer_data_with_year.csv'

    # Load and preprocess data
    df = load_data(file_path)
    if df is not None:
        X, y_problems, y_solutions, problem_encoder, solution_encoder = preprocess_data(df)

        # Build and train the models
        problem_model, solution_model = build_models(X, y_problems, y_solutions)

        print("\nModel training completed successfully!")

        # Example prediction for testing
        car_model = "Maruti Suzuki"
        manufacture_year = 2018

        print(f"\nPredicting issues for a {car_model} manufactured in {manufacture_year}:")
        prediction = predict_issues_and_solutions(car_model, manufacture_year)

        if prediction:
            print(f"\nMost likely problem: {prediction['most_likely_problem']}")
            print(f"Recommended solution: {prediction['most_likely_solution']}")

            print("\nPotential future issues (Problem, Probability %):")
            for problem, probability in prediction['potential_problems']:
                print(f"- {problem}: {probability:.2f}%")

            print("\nPotential solutions (Solution, Probability %):")
            for solution, probability in prediction['potential_solutions']:
                print(f"- {solution}: {probability:.2f}%")


if __name__ == "__main__":
    main()
