<?php

namespace Database\Seeders;

use App\Models\global\GlobalBrand;
use App\Models\global\GlobalBrandSector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlobalBrandSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sectors:

        // 1 'Agriculture'
        // 2 'Education'
        // 3 'Insurance'
        // 4 'Information Technology'
        // 5 'Audit'
        // 6 'Banking'
        // 7 'Communication'
        // 8 'Science & Technology'
        // .. 'Other


        // brands: 

        // 1 CIC Life
        // 2 Safaricom
        // 3 Coop bank
        // 4 KPMG


        $brands = GlobalBrand::all();

        $brand_sectors = [
            1 => ["sectors" => [3]],
            2 => ["sectors" => [4, 7]],
            3 => ["sectors" => [5]],
            4 => ["sectors" => [5]],
        ];


        foreach ($brands as $brand) {
            foreach ($brand_sectors[$brand->id]["sectors"] as $sector) {
                GlobalBrandSector::create([
                    'global_brand_id' => $brand->id,
                    'sector_id' => $sector,
                ]);
            }
        }
    }
}
