<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\global\GlobalBrand;
use App\Models\member\MemberEntityLoanRepayment;
use App\Models\member\MemberEntityProductPurchase;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // meta
            RoleSeeder::class,
            SectorSeeder::class,
            EntityTypeSeeder::class,
            PaymentFrequencySeeder::class,
            
            PurchaseTypeSeeder::class,
            ProductTypeSeeder::class,
            PurchaseDurationSeeder::class,

            // phase 1 : entities, users
            EntitySeeder::class,
            UserSeeder::class,

            // phase 2 : contributions
            EntityContributionSeeder::class,
            EntityMemberContributionSeeder::class,

            // phase 3: products
            EntityProductSeeder::class,
            MemberEntityProductPurchaseSeeder::class,

            // phase 4: loans
            EntityLoanSeeder::class,
            MemberEntityLoanRequestSeeder::class,
            MemberEntityLoanSeeder::class,
            MemberEntityLoanRepaymentSeeder::class,

            // phase 5: global-products
            GlobalBrandSeeder::class,
            GlobalBrandSectorSeeder::class,
            GlobalProductSeeder::class,
        ]);
    }
}
