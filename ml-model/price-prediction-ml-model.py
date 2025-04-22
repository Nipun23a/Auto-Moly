import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler, OneHotEncoder
from sklearn.compose import ColumnTransformer
from sklearn.pipeline import Pipeline
from sklearn.impute import SimpleImputer
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import mean_squared_error, r2_score, mean_absolute_error
import re


# Step 1: Load and sample the data
def load_and_sample_data(file_path, sample_size=1000):
    df = pd.read_csv(file_path)
    print(f"Original dataset shape: {df.shape}")

    # Sample the data
    if len(df) > sample_size:
        df = df.sample(sample_size, random_state=42)

    print(f"Sampled dataset shape: {df.shape}")
    print("\nMissing values per column:")
    print(df.isnull().sum())

    return df


# Step 2: Clean and preprocess the data
def preprocess_data(df):
    # Create a copy to avoid warnings
    data = df.copy()

    # Select only the most important columns for prediction
    # This reduces dimensionality and memory usage
    columns_to_keep = [
        'price', 'year', 'manufacturer', 'model', 'condition',
        'cylinders', 'fuel', 'odometer', 'title_status',
        'transmission', 'drive', 'type', 'paint_color'
    ]

    # Keep only the columns that exist in the dataset
    columns_to_keep = [col for col in columns_to_keep if col in data.columns]
    data = data[columns_to_keep]

    # Convert price to numeric if it's not already
    if data['price'].dtype == 'object':
        data['price'] = pd.to_numeric(data['price'], errors='coerce')

    # Convert year to numeric if it's not already
    if data['year'].dtype == 'object':
        data['year'] = pd.to_numeric(data['year'], errors='coerce')

    # Convert odometer to numeric if it's not already
    if data['odometer'].dtype == 'object':
        data['odometer'] = pd.to_numeric(data['odometer'], errors='coerce')

    # Handle cylinders (extract the number)
    if 'cylinders' in data.columns:
        def extract_cylinder_number(cyl_str):
            if pd.isna(cyl_str):
                return np.nan
            if isinstance(cyl_str, (int, float)):
                return cyl_str
            match = re.search(r'(\d+)', str(cyl_str))
            return float(match.group(1)) if match else np.nan

        data['cylinders'] = data['cylinders'].apply(extract_cylinder_number)

    # Drop rows with missing price (our target variable)
    data = data.dropna(subset=['price'])

    # Remove outliers from price
    Q1 = data['price'].quantile(0.01)
    Q3 = data['price'].quantile(0.99)
    IQR = Q3 - Q1
    data = data[(data['price'] >= Q1 - 1.5 * IQR) & (data['price'] <= Q3 + 1.5 * IQR)]

    # Limit the number of categories in high-cardinality categorical columns
    if 'model' in data.columns:
        # Keep only the top 20 most common models
        top_models = data['model'].value_counts().nlargest(20).index
        data.loc[~data['model'].isin(top_models), 'model'] = 'other'

    if 'manufacturer' in data.columns:
        # Keep only the top 15 most common manufacturers
        top_manufacturers = data['manufacturer'].value_counts().nlargest(15).index
        data.loc[~data['manufacturer'].isin(top_manufacturers), 'manufacturer'] = 'other'

    return data


# Step 3: Feature engineering
def engineer_features(df):
    data = df.copy()

    # Create car age feature
    current_year = 2025
    data['car_age'] = current_year - data['year']

    # Create price per odometer feature (value retention)
    if 'odometer' in data.columns:
        data['price_per_mile'] = data['price'] / (data['odometer'] + 1)  # Add 1 to avoid division by zero

    return data


# Step 4: Define features and target
def prepare_for_modeling(df):
    # Target variable
    y = df['price']

    # Feature set (remove the target and any redundant columns)
    columns_to_drop = ['price']
    if 'price_per_mile' in df.columns:
        columns_to_drop.append('price_per_mile')

    X = df.drop(columns=columns_to_drop, errors='ignore')

    return X, y


# Step 5: Create preprocessing pipeline with memory optimization
def create_preprocessing_pipeline(X):
    # Identify numeric and categorical columns
    numeric_features = X.select_dtypes(include=['int64', 'float64']).columns.tolist()
    categorical_features = X.select_dtypes(include=['object']).columns.tolist()

    # Numeric features preprocessing
    numeric_transformer = Pipeline(steps=[
        ('imputer', SimpleImputer(strategy='median')),
        ('scaler', StandardScaler())
    ])

    # Categorical features preprocessing with memory optimization
    categorical_transformer = Pipeline(steps=[
        ('imputer', SimpleImputer(strategy='most_frequent')),
        ('onehot', OneHotEncoder(handle_unknown='ignore', sparse_output=True))  # Use sparse matrix
    ])

    # Combine preprocessing steps
    preprocessor = ColumnTransformer(
        transformers=[
            ('num', numeric_transformer, numeric_features),
            ('cat', categorical_transformer, categorical_features)
        ])

    return preprocessor


# Step 6: Create model pipeline
def create_model_pipeline(preprocessor):
    # Random Forest Pipeline
    rf_pipeline = Pipeline(steps=[
        ('preprocessor', preprocessor),
        ('model', RandomForestRegressor(n_estimators=100, random_state=42))
    ])

    return rf_pipeline


# Step 7: Train and evaluate model
def train_and_evaluate(pipeline, X_train, X_test, y_train, y_test):
    # Train the model
    pipeline.fit(X_train, y_train)

    # Make predictions
    y_pred = pipeline.predict(X_test)

    # Evaluate the model
    mse = mean_squared_error(y_test, y_pred)
    rmse = np.sqrt(mse)
    mae = mean_absolute_error(y_test, y_pred)
    r2 = r2_score(y_test, y_pred)

    print(f"Mean Squared Error: {mse:.2f}")
    print(f"Root Mean Squared Error: {rmse:.2f}")
    print(f"Mean Absolute Error: {mae:.2f}")
    print(f"R² Score: {r2:.4f}")

    return pipeline, y_pred


# Function to visualize results
def visualize_results(y_test, y_pred):
    plt.figure(figsize=(10, 6))
    plt.scatter(y_test, y_pred, alpha=0.5)
    plt.plot([y_test.min(), y_test.max()], [y_test.min(), y_test.max()], 'r--')
    plt.xlabel('Actual Price')
    plt.ylabel('Predicted Price')
    plt.title('Actual vs Predicted Prices')
    plt.tight_layout()
    plt.savefig('price_prediction_results.png')
    plt.close()
    print("Results visualization saved to 'price_prediction_results.png'")


# Function to display feature importance
def display_feature_importance(model, X):
    # Get feature importances from the Random Forest model
    if hasattr(model.named_steps['model'], 'feature_importances_'):
        # Get the feature names after preprocessing
        feature_names = []
        for name, transformer, columns in model.named_steps['preprocessor'].transformers_:
            if name == 'num':
                feature_names.extend(columns)
            elif name == 'cat':
                # For categorical features, get the one-hot encoded feature names
                feature_names.extend([f"{col}_{cat}" for col in columns
                                      for cat in model.named_steps['preprocessor'].named_transformers_[name]
                                     .named_steps['imputer'].statistics_])

        # Get feature importances
        importances = model.named_steps['model'].feature_importances_

        # Sort feature importances
        sorted_indices = np.argsort(importances)[::-1]

        # Display top 10 features
        print("\nTop 10 Feature Importances:")
        for i in range(min(10, len(sorted_indices))):
            if i < len(feature_names):
                print(f"{i + 1}. {feature_names[sorted_indices[i]]}: {importances[sorted_indices[i]]:.4f}")
            else:
                print(f"{i + 1}. Feature {sorted_indices[i]}: {importances[sorted_indices[i]]:.4f}")


# Step 8: Put it all together
def predict_car_prices(file_path):
    # Load and sample data
    print("Loading and sampling data...")
    df = load_and_sample_data(file_path, sample_size=1000)

    # Preprocess data
    print("\nPreprocessing data...")
    df_clean = preprocess_data(df)
    print(f"Shape after preprocessing: {df_clean.shape}")

    # Engineer features
    print("\nEngineering features...")
    df_engineered = engineer_features(df_clean)

    # Prepare for modeling
    print("\nPreparing for modeling...")
    X, y = prepare_for_modeling(df_engineered)
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

    # Create preprocessing pipeline
    print("\nCreating preprocessing pipeline...")
    preprocessor = create_preprocessing_pipeline(X)

    # Create model pipeline
    print("\nCreating model pipeline...")
    model_pipeline = create_model_pipeline(preprocessor)

    # Train and evaluate model
    print("\nTraining and evaluating model:")
    trained_pipeline, y_pred = train_and_evaluate(model_pipeline, X_train, X_test, y_train, y_test)

    # Visualize results
    print("\nVisualizing results...")
    visualize_results(y_test, y_pred)

    # Display feature importance
    print("\nAnalyzing feature importance...")
    try:
        display_feature_importance(trained_pipeline, X)
    except Exception as e:
        print(f"Could not display feature importance: {e}")

    return trained_pipeline


# Example usage
if __name__ == "__main__":
    file_path = "vehicles.csv"

    try:
        model = predict_car_prices(file_path)
        from joblib import dump

        dump(model, 'car_price_prediction_model.joblib')
        print("\nModel saved to 'car_price_prediction_model.joblib'")

        # How to make predictions with new data
        print("\nExample of using the model to predict with new data:")
        print("1. Load the model:")
        print("   from joblib import load")
        print("   model = load('car_price_prediction_model.joblib')")
        print("2. Prepare your new data in the same format as the training data")
        print("3. Make predictions:")
        print("   predictions = model.predict(new_data)")

    except Exception as e:
        print(f"\nAn error occurred: {e}")
        import traceback

        traceback.print_exc()
