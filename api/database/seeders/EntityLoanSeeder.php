<?php

namespace Database\Seeders;

use App\Models\entity\Entity;
use App\Models\entity\EntityLoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntityLoanSeeder extends Seeder
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
            EntityLoan::create([
                "name" => "Basic loan",
                "entity_id" => $entity->id,
                "details" => $faker->words($nb = 80, $asText = true),
                "purchase_duration_id" => 1, // 12 months
                "min_amount" => 1000,
                "max_amount" => ($faker->randomDigitNotNull() * 5000),
                "rate_pa" => $faker->randomFloat($nbMaxDecimals = NULL, $min = 3, $max = 15),
            ]);
        }
    }
}
