<?php

namespace Database\Seeders;

use App\Models\entity\Entity;
use App\Models\entity\EntityProduct;
use App\Models\PaymentFrequency;
use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntityProductSeeder extends Seeder
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
            foreach (range(1,6) as $product_number) {
                $randomProductType = ProductType::inRandomOrder()->first();
                if($randomProductType->purchase_type_id === 2){ // if it is a subscription, id "2"
                    $randomPaymentFrequency = PaymentFrequency::inRandomOrder()->first()->id;
                } else {
                    $randomPaymentFrequency = null;
                }
                
                EntityProduct::create([
                    "name" => "Product ".$product_number,
                    "description" => $faker->words($nb = 40, $asText = true),
                    "price" => ($faker->randomDigitNotNull() * 500),
                    "entity_id" => $entity->id,
                    "product_type_id" => $randomProductType->id,
                    "payment_frequency_id" => $randomPaymentFrequency, // once or subscription
                ]);
            }
        }
    }
}
