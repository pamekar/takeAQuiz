<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        foreach (range(1, 500) as $index) {
            \Illuminate\Support\Facades\DB::table('questions')->insert([
                'question_id' => $faker->unique()->md5,
                'question'    => $faker->realText(350) . "?",
                'option_a'    => $faker->realText(50),
                'option_b'    => $faker->realText(50),
                'option_c'    => $faker->realText(50),
                'option_d'    => $faker->realText(50),
                'answer'      => $faker->randomElement(['a', 'b', 'c', 'd']),
                'score'       => $faker->randomElement([1, 2, 3, 4]),
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now(),
            ]);

        }
    }
}
