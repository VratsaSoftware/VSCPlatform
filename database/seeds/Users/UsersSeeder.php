<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Users\User::create([
                'name' => 'Admin',
                'email' => 'admin@vsc.com',
                'last_name' => 'admin',
                'password' => bcrypt('123321'),
            ]);
    }
}
