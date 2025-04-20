<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sedan',
                'description' => 'Compact and comfortable vehicles suitable for city and highway driving.'
                'file_link' =>
            ],
            [
                'name' => 'SUV',
                'description' => 'Sport Utility Vehicles with higher ground clearance and off-road capability.'
            ],
            [
                'name' => 'Hatchback',
                'description' => 'Small and efficient vehicles ideal for urban driving.'
            ],
            [
                'name' => 'Pickup Truck',
                'description' => 'Utility vehicles with an open cargo area for transporting goods.'
            ],
            [
                'name' => 'Motorcycle',
                'description' => 'Two-wheeled motor vehicles for personal transportation.'
            ],
            [
                'name' => 'Van',
                'description' => 'Spacious vehicles ideal for transporting passengers or cargo.'
            ],
            [
                'name' => 'Convertible',
                'description' => 'Stylish cars with retractable roofs for open-air driving.'
            ],
            [
                'name' => 'Electric Vehicle (EV)',
                'description' => 'Eco-friendly vehicles powered entirely by electricity.'
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
