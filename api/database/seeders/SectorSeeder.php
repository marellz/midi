<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sectors = [
            'Agriculture',
            'Eductation',
            'Insurance',
            'Information Technology',
            'Audit',
            'Banking',
            'Communication',
            'Science & Technology',
            'Other'
            //populate
        ];

        foreach ($sectors as $sector) {
            Sector::create(['name' => $sector]);
        }
    }
}
