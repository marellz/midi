<?php

namespace Database\Seeders;

use App\Models\ProductType;
use App\Models\PurchaseType;
use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        foreach (range(1, 5) as $type) {
            $randomSector = Sector::inRandomOrder()->first();
            $randomPurchaseType = PurchaseType::inRandomOrder()->first();
            ProductType::create([
                'name' => 'type ' . $type,
                'purchase_type_id' => $randomPurchaseType->id,
                'sector_id' => $randomSector->id,
            ]);
        }
    }
}
