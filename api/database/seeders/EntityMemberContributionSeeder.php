<?php

namespace Database\Seeders;

use App\Models\entity\Entity;
use App\Models\entity\EntityContribution;
use App\Models\entity\EntityMember;
use App\Models\entity\EntityMemberContribution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntityMemberContributionSeeder extends Seeder
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

        $entity_contributions = EntityContribution::all();

        foreach ($entity_contributions as $et) {
            $entity = Entity::find($et->entity_id);
            $et_members = EntityMember::where('entity_id', $entity->id)->limit(10)->get();
            // $periods = ['April', 'May', 'June']; // try later
            foreach ($et_members as $member) {
                EntityMemberContribution::create([
                    "entity_member_id" => $member->id,
                    "entity_contribution_id" => $et->id,
                    "amount" => $et->amount,
                    "phone" => $faker->e164PhoneNumber,
                    "transaction_code" => $faker->swiftBicNumber,
                    "contribution_period" => 'may/2023',
                ]);
            }
        }
    }
}
