import csv
import random

# Input and output file paths
input_file = 'customer_data_with_year.csv'
output_file = 'vehicle_data_with_specs.csv'

# Define random ranges
ground_clearance_range = (150, 220)  # mm
fuel_consumption_range = (10, 22)  # km/l

# Read input CSV and write to new CSV with added columns
with open(input_file, mode='r', newline='', encoding='utf-8') as infile, \
    open(output_file, mode='w', newline='', encoding='utf-8') as outfile:
    reader = csv.DictReader(infile)
    fieldnames = reader.fieldnames + ['GROUND_CLEARANCE', 'FUEL_CONSUMPTION']
    writer = csv.DictWriter(outfile, fieldnames=fieldnames)

    writer.writeheader()
    for row in reader:
        row['GROUND_CLEARANCE'] = random.randint(*ground_clearance_range)
        row['FUEL_CONSUMPTION'] = round(random.uniform(*fuel_consumption_range), 1)
        writer.writerow(row)

print(f"New CSV file created: {output_file}")
