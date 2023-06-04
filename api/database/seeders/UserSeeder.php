<?php

namespace Database\Seeders;

use App\Models\entity\Entity;
use App\Models\entity\EntityMember;
use App\Models\User;
use App\Models\user\Role;
use App\Models\user\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * 
     */

    public function run()
    {
        //
        $roles = Role::all();
        $entities = Entity::get();


        function createRoles($num, $roleID) // move to traits
        {
            $faker = Faker::create();
            $users = collect([]);
            foreach (range(1, $num) as $value) {
                # code...
                # code...
                $name =  $faker->firstName($gender = null) . ' ' . $faker->lastName;
                $email = $faker->email;
                $email_exists = User::where('email', $email)->first();
                if ($email_exists) {
                    $email = $faker->safeEmail;
                }
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $faker->e164PhoneNumber,
                    'password' => bcrypt('secret123'),
                ]);

                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $roleID,
                ]);

                $users->push($user);
            }
            return $users;
        }

        foreach ($roles as $role) {

            switch ($role->name) {
                case 'super_admin':
                    # code...
                    createRoles(1, $role->id);
                    break;
                case 'admin':
                    # code...
                    createRoles(5, $role->id);
                    break;
                case 'entity_admin':
                    // foreach entity
                    foreach ($entities as $entity) {
                        $entity_admin = createRoles(1, $role->id)->first();
                        EntityMember::create([
                            "user_id" => $entity_admin->id,
                            "entity_id" => $entity->id,
                            "is_admin" => true
                        ]);
                    }
                    # code...
                    break;
                case 'member':
                    # code...
                    foreach ($entities as $entity) {
                        $users = createRoles(50, $role->id);
                        foreach ($users as $user) {
                            EntityMember::create([
                                "user_id" => $user->id,
                                "entity_id" => $entity->id
                            ]);
                        }
                    }

                    break;

                default:
                    # code...
                    createRoles(10, $role->id);
                    break;
            }
        }
    }
}
