<?php

namespace Database\Seeders;

use App\Models\PaymentFrequency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $frequencies = [
            'annual',
            'semi-annually',
            'quarter-annually',
            'monthly',
            'weekly',
            'daily',
        ];

        foreach ($frequencies as $frequency) {
            PaymentFrequency::create(['name' => $frequency]);
        }
    }
}
