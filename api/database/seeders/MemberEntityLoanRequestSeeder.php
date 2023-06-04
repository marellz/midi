<?php

namespace Database\Seeders;

use App\Models\entity\Entity;
use App\Models\member\MemberEntityLoanRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MemberEntityLoanRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $entities = Entity::all();
        $faker = Faker::create();

        foreach ($entities as $entity) {
            $count = round($entity->members->count() * .75); // 75% of the members have requested loans
            $members = $entity->members->random($count);
            $entity_loan = $entity->loans->random();

            foreach ($members as $member) {

                $principal_amount = $faker->numberBetween($min = round($entity_loan->min_amount), $max = round($entity_loan->max_amount));
                $randomMonthlyIntervals = $faker->numberBetween($min =6, $max= 18);

                MemberEntityLoanRequest::create([
                    "member_id" => $member->id,
                    "entity_loan_id" => $entity_loan->id,
                    "intervals" => $randomMonthlyIntervals,
                    "payment_frequency_id" => 4, //monthly
                    "principal_amount" => $principal_amount,
                    "approved" => $faker->boolean($chanceOfGettingTrue = 60), // only half the requests are approved,

                ]);
            }
        }
    }
}
