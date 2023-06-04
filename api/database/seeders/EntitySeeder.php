<?php

namespace Database\Seeders;

use App\Models\entity\Entity;
use App\Models\entity\EntityType;
use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $sectors = Sector::inRandomOrder();
        $faker = Faker::create();

        foreach (range(1, 50) as $item) {
            $entity_type = EntityType::inRandomOrder()->first();
            $sector = Sector::inRandomOrder()->first();

            Entity::create([
                "name" => $faker->company . ' ' . $entity_type->name,
                "entity_type_id" => $entity_type->id,
                "sector_id" => $sector->id,
                "description" => $faker->words($nb = 40, $asText = true),
            ]);

            // create a admin; add him as first member, add roles:member, entity_admin

            // create set of users, add roles: member
        }
    }
}
