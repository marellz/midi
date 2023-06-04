<?php

namespace Database\Seeders;

use App\Models\PurchaseDuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $durations = [
            ["in_months" => 12, "label" => "1 year",],
            ["in_months" => 6, "label" => "6 months",],
            ["in_months" => 3, "label" => "3 months",],
            ["in_months" => 1, "label" => "1 month",],
        ];

        foreach ($durations as $duration) {
            PurchaseDuration::create($duration);
        }
    }
}
