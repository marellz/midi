<?php

namespace Database\Seeders;

use App\Models\entity\Entity;
use App\Models\entity\EntityContribution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntityContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $faker = Faker::create();
        $entities = Entity::all();

        foreach ($entities as $entity) {
            EntityContribution::create([
                "entity_id" => $entity->id,
                "name" => 'Default',
                "info" => $faker->words($nb = 10, $asText = true),
                "amount" => ($faker->randomDigitNotNull() * 100)
            ]);
        }
    }
}
