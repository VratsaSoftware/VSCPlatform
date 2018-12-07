<?php

use Illuminate\Database\Seeder;

class UsersTeamRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['captain','member'];
        foreach ($roles as $key => $role) {
            App\Models\Users\UsersTeamRole::create([
                'role' => $role,
            ]);
        }
    }
}
