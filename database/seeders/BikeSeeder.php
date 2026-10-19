<?php

namespace Database\Seeders;

use App\Models\Bike;
use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
    /**ngisi seeder **/
    public function run(): void
    {
        // Hapus data lama dulu supaya seeder boleh dijalankan berulang
        // tanpa menduplikasi unit (idempotent).
        Bike::query()->delete();

        $bikes = [
            [
                'brand' => 'Polygon',
                'type' => 'Mountain Bike',
                'rent_price' => 50000,
                'gear_count' => 21,
                'image' => 'polygon-xtrada-5.png',
                'available' => true,
            ],
            [
                'brand' => 'Element',
                'type' => 'Sepeda Lipat',
                'rent_price' => 35000,
                'gear_count' => 7,
                'image' => 'element-lipat-20.png',
                'available' => true,
            ],
            [
                'brand' => 'Wimcycle',
                'type' => 'Road Bike',
                'rent_price' => 65000,
                'gear_count' => 16,
                'image' => 'wimcycle-roadster.png',
                'available' => false,
            ],
            [
                'brand' => 'Pacific',
                'type' => 'City Bike',
                'rent_price' => 30000,
                'gear_count' => 6,
                'image' => 'pacific-city-6.png',
                'available' => true,
            ],
            [
                'brand' => 'United',
                'type' => 'Mountain Bike',
                'rent_price' => 55000,
                'gear_count' => 24,
                'image' => 'united-clovis.png',
                'available' => true,
            ],
            [
                'brand' => 'Thrill',
                'type' => 'Road Bike',
                'rent_price' => 70000,
                'gear_count' => 18,
                'image' => 'thrill-ravion.png',
                'available' => true,
            ],
        ];

        foreach ($bikes as $bike) {
            Bike::create($bike);
        }
    }
}
