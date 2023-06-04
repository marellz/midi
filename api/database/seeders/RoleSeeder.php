<?php

namespace Database\Seeders;

use App\Models\user\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $roles = [
            'super_admin',
            'admin',
            'entity_admin',
            'member',
            'agent',
            'service_provider',
        ];

        foreach ($roles as $role) {
            Role::create(['name'=>$role]);
        }
    }
}
