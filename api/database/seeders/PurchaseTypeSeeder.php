<?php

namespace Database\Seeders;

use App\Models\PurchaseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $types = [
            'one time',
            'subscription'
        ];

        foreach ($types as $type ) {
            PurchaseType::create(['name'=>$type]);
        }
    }
}
