<?php

namespace Database\Seeders;

use App\Models\global\GlobalBrand;
use App\Models\global\GlobalBrandSector;
use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GlobalBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        $brands = [
            "CIC Life",
            "Safaricom",
            "Coop bank",
            "KPMG",
        ];

        foreach ($brands as $b) {
            GlobalBrand::create([
                "name" => $b,
                "about" => $faker->words($nb = 100, $asText = true),
                "location" => $faker->city() . ", " . "Nairobi, Kenya",

            ]);
        }
    }
}
