<?php

use Illuminate\Database\Seeder;

class UserOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupations = ['student(highschool)','student(university)','employed','unemployed','part-time','other'];
        foreach ($occupations as $key => $occupation) {
            App\Models\Users\Occupation::create([
                'occupation' => $occupation,
            ]);
        }
    }
}
