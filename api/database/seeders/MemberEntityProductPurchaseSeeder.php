<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\entity\Entity;
use App\Models\member\MemberEntityProductPurchase;
use App\Models\PurchaseDuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberEntityProductPurchaseSeeder extends Seeder
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
        $durations = PurchaseDuration::all();

        foreach ($entities as $entity) {
            $members = $entity->members;

            // only half purchased any product
            $count = round($members->count() / 2);
            $members_that_purchased = $members->random($count);

            foreach ($members_that_purchased as $member) {
                $product_purchased = $entity->products->random();
                $today = Carbon::today();
                

                // add purchase_duration in months
                $duration = $durations->random();
                $end_date = $today->addMonths($duration->in_months);
                
                // $end_date = $today->addMonths($product_purchased->purchase_duration);
                // $end_date = $product_purchased->payment_frequency_id ? $today->addyears(1) : null;

                MemberEntityProductPurchase::create([
                    "member_id" => $member->id,
                    "entity_product_id" => $product_purchased->id,
                    "purchase_duration_id" => $duration->id, 
                    "start_date" => $today,
                    "end_date" => $end_date,
                ]);
            }
        }
    }
}
