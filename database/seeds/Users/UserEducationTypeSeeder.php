<?php

use Illuminate\Database\Seeder;

class UserEducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['vocational education','bachelor','master','phd'];
        foreach ($types as $key => $type) {
            App\Models\Users\EducationType::create([
                'type' => $type,
            ]);
        }
    }
}
