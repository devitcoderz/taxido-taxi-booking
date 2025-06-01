<?php

namespace Database\Seeders;

use App\Models\ParcelCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParcelCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParcelCategory::create([
           'title' => 'Standard parcels',
        ]);
        ParcelCategory::create([
            'title' => 'Food and perishable parcels',
        ]);
        ParcelCategory::create([
            'title' => 'Sensitive and fragile parcels',
        ]);
        ParcelCategory::create([
            'title' => 'Valuable parcels',
        ]);
        ParcelCategory::create([
            'title' => 'Medical and pharmaceutical parcels',
        ]);
        ParcelCategory::create([
            'title' => 'Dangerous parcels or regulated',
        ]);
        ParcelCategory::create([
            'title' => 'Large and bulky parcels',
        ]);
        ParcelCategory::create([
            'title' => 'Live animal parcels',
        ]);
        ParcelCategory::create([
            'title' => 'Express and urgent parcels',
        ]);
        ParcelCategory::create([
            'title' => 'International parcels',
        ]);
    }
}
