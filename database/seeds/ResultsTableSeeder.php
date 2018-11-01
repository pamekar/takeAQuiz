<?php

use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $users = \App\User::pluck('name')->toArray();
        foreach (range(1, 1243) as $index) {
            $date = $faker->dateTimeBetween('-2 years', 'now');
            \Illuminate\Support\Facades\DB::table('results')->insert([
                'name'           => $faker->randomElement($users),
                'score'          => mt_rand(20, 100),
                'duration'       => mt_rand(5, 30),
                'question_count' => mt_rand(5, 50),
                'started_at'     => $date,
                'created_at'     => $date,
                'updated_at'     => $date
            ]);
        }
    }
}
