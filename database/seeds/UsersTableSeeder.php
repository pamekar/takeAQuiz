<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 107) as $index) {
            $gender = $faker->randomElement(['male', 'female']);
            $date = $faker->dateTimeBetween('-2 years', 'now');
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name'              => $faker->unique()->userName,
                'title'             => $faker->title($gender),
                'first_name'        => $faker->firstName($gender),
                'last_name'         => $faker->lastName,
                'phone_no'          => $faker->phoneNumber,
                'email'             => $faker->unique()->email,
                'email_verified_at' => $date,
                'password'          => \Illuminate\Support\Facades\Hash::make('innovation'),
                'created_at'        => $date,
                'updated_at'        => $date
            ]);
        }
    }
}
