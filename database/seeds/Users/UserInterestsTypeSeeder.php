<?php

use Illuminate\Database\Seeder;

class UserInterestsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['programming','design','digital_marketing','entrepreneurship','sports','other'];
        foreach ($types as $key => $type) {
            App\Models\Users\InterestsType::create([
                'type' => $type,
            ]);
        }
    }
}
