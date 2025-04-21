import csv
import random
from datetime import datetime

# Define the input and output file paths
input_file = "customer_data.csv"  # Replace with your actual input file name
output_file = "customer_data_with_year.csv"

# Define the range for random manufacture years
# Using a reasonable range for vehicles (e.g., 2000 to current year)
current_year = datetime.now().year
min_year = 2000
max_year = current_year

# Read the input CSV and write to the output CSV with the additional column
try:
    with open(input_file, 'r', newline='') as infile, open(output_file, 'w', newline='') as outfile:
        # Create CSV reader and writer
        reader = csv.reader(infile)
        writer = csv.writer(outfile)

        # Read the header row
        header = next(reader)

        # Add the new column header
        new_header = header + ["MANUFACTURE_YEAR"]
        writer.writerow(new_header)

        # Process each row
        for row in reader:
            # Generate a random manufacture year
            random_year = random.randint(min_year, max_year)

            # Add the manufacture year to the row
            new_row = row + [str(random_year)]

            # Write the new row to the output file
            writer.writerow(new_row)

    print(f"Successfully created {output_file} with added manufacture year column.")

except FileNotFoundError:
    print(f"Error: The file '{input_file}' was not found.")
except Exception as e:
    print(f"An error occurred: {e}")
