<?php

namespace Database\Seeders;

use App\Models\entity\EntityLoan;
use App\Models\member\MemberEntityLoan;
use App\Models\member\MemberEntityLoanRepayment;
use App\Models\member\MemberEntityLoanRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MemberEntityLoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $loan_requests = MemberEntityLoanRequest::where('approved', true)->get();
        $today = Carbon::today();
        $start_date = $today->subYear();

        foreach ($loan_requests  as $req) {
            $entity_loan = EntityLoan::find($req->entity_loan_id);
            $amount_payable = $req->principal_amount * (1 + ($entity_loan->rate_pa / 100));

            MemberEntityLoan::create([
                "member_id" => $req->member_id,
                "entity_loan_id" => $req->entity_loan_id,
                "payment_frequency_id" => $req->payment_frequency_id,
                "member_entity_loan_request_id" => $req->id,
                "intervals" => $req->intervals,
                "per_interval_payment" => $amount_payable / $req->intervals,
                "amount_payable" => $amount_payable,
                "balance_due" => $amount_payable,
                "start_date" => $start_date,
                "due_date" => $today->addMonths($req->intervals),
            ]);
        }
    }
}
