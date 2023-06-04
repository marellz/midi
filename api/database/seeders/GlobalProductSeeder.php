<?php

namespace Database\Seeders;

use App\Models\global\GlobalBrand;
use App\Models\global\GlobalProduct;
use App\Models\PurchaseType;
use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class GlobalProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $brands = GlobalBrand::all();



        // $sectors = $brand->sectors;
        $products = [
            "Motor Private Insurance",
            "Motor commercial Insurance",
            "Home Insurance",
            "Money market Fund",
            "Academia",
            "Jipange plus"
        ];

        foreach ($products as $product) {

            $faker = Faker::create();
            $fee = $faker->randomDigitNotNull() * 5000;
            $extraFee = $faker->randomDigitNotNull() * 1000;
            $max_fee = $faker->boolean($chanceOfGettingTrue = 50) ? $fee + $extraFee : null;
            $randomPurchaseType = PurchaseType::inRandomOrder()->first();
            // $sector = Sector::findOrFail($brand_sector->sector_id);

            GlobalProduct::create([
                "name" => $product,
                "global_brand_id" => 1, // CIC
                "description" => $faker->words($nb = 100, $asText = true),
                // "product_type_id" => "",
                "purchase_type_id" => $randomPurchaseType->id,
                "purchase_duration_id" => 1, // one time
                "payment_frequency_id" => $randomPurchaseType->id === 2 ? 4 : null,
                "sector_id" => 1, // insurance
                "fee" => $fee,
                "fee_max" => $max_fee,
            ]);
        }
    }
}
