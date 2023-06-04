<?php

namespace Database\Seeders;

use App\Models\member\MemberEntityLoan;
use App\Models\member\MemberEntityLoanRepayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class MemberEntityLoanRepaymentSeeder extends Seeder
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
        $loans = MemberEntityLoan::all();

        foreach ($loans as $loan) {

            $payments = $faker->numberBetween($min = 2, $max = $loan->intervals);
            $remaining_balance  = $loan->amount_payable * ($payments / $loan->intervals);
            $loan->update([
                "balance_due" => $remaining_balance,
            ]);

            $start_date = Carbon::create($loan->start_date);

            foreach (range(1, $payments) as $payment) {
                $updated_period = $start_date->addMonths($payment); // assuming it is monthly
                $updated_period_str = $updated_period->format('F/Y');

                MemberEntityLoanRepayment::create([
                    "member_entity_loan_id" => $loan->id,
                    "payment_period" => $updated_period_str,
                    "amount_paid" => $loan->per_interval_payment,
                    "transaction_code" => $faker->swiftBicNumber,
                    "received_date" => $updated_period,
                ]);
            }
        }
    }
}
