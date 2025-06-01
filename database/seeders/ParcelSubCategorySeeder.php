<?php

namespace Database\Seeders;

use App\Models\ParcelSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParcelSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParcelSubCategory::create([
           'category_id' => 1,
           'title' => 'Small packages (less than 5 kg)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Cardboard boxes and cartons (medium size, 5–20 kg)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Large parcels (furniture, household appliances, etc.)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Grocery shopping (supermarket deliveries)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Prepared meals (restaurant deliveries)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Fresh produce (meat, fish, vegetables)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Frozen products'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Glass items (dishes, glassware)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Electronics (phones, computers)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Works of art and decorative objects'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Musical instruments'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Parcels with special tracking (jewelry, important documents)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Luxury deliveries (watches, high-end clothing)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Insured parcels'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Medicines and prescriptions'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Medical equipment'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Laboratory products'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Chemical products (with specific labeling)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Lithium batteries (electronic devices)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Flammable materials (transport restrictions)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 7,
            'title' => 'Furniture (sofas, tables, wardrobes)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 7,
            'title' => 'Household appliances (refrigerators, washing machines)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 7,
            'title' => 'Bicycles and sports equipment'
        ]);
        ParcelSubCategory::create([
            'category_id' => 8,
            'title' => 'Pets (dogs, cats, birds)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 8,
            'title' => 'under conditions'
        ]);
        ParcelSubCategory::create([
            'category_id' => 8,
            'title' => 'Delivery of fish or reptiles (specialized)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 9,
            'title' => 'Urgent documents (contracts, legal files)'
        ]);
        ParcelSubCategory::create([
            'category_id' => 9,
            'title' => 'Spare parts for repairs'
        ]);
        ParcelSubCategory::create([
            'category_id' => 9,
            'title' => 'Last minute orders'
        ]);
        ParcelSubCategory::create([
            'category_id' => 10,
            'title' => 'Postal shipments abroad'
        ]);
        ParcelSubCategory::create([
            'category_id' => 10,
            'title' => 'Customs and international freight'
        ]);
    }
}
