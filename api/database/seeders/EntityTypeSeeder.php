<?php

namespace Database\Seeders;

use App\Models\entity\EntityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntityTypeSeeder extends Seeder
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
            'Cooperative',
            'Sacco',
            'Association',
            'Group',
            //populate
        ];

        foreach ($types as $type ) {
            EntityType::create(['name'=>$type]);
        }
    }
}
