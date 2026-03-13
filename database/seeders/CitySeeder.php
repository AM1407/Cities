<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['name' => 'Paris', 'country' => 'France', 'continent' => 'Europe', 'population' => 2161000, 'top_tourist_destination' => true],
            ['name' => 'New York', 'country' => 'USA', 'continent' => 'North America', 'population' => 8336817, 'top_tourist_destination' => true],
            ['name' => 'Tokyo', 'country' => 'Japan', 'continent' => 'Asia', 'population' => 13960000, 'top_tourist_destination' => true],
            ['name' => 'Rome', 'country' => 'Italy', 'continent' => 'Europe', 'population' => 2873000, 'top_tourist_destination' => true],
            ['name' => 'Sydney', 'country' => 'Australia', 'continent' => 'Oceania', 'population' => 5312000, 'top_tourist_destination' => true],
            ['name' => 'Cairo', 'country' => 'Egypt', 'continent' => 'Africa', 'population' => 10107000, 'top_tourist_destination' => false],
            ['name' => 'Buenos Aires', 'country' => 'Argentina', 'continent' => 'South America', 'population' => 3054300, 'top_tourist_destination' => false],
            ['name' => 'Berlin', 'country' => 'Germany', 'continent' => 'Europe', 'population' => 3645000, 'top_tourist_destination' => false],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
