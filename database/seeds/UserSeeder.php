<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // =============================== For Admin 1 ===============================
        $faker = Faker\Factory::create();
        $firstName = $faker->firstNameMale;
        $middleName = $faker->lastName;
        $lastName = $faker->lastName;
        $userID = DB::table('users')->insertGetId([
            'name' => ucwords(sprintf("%s %s %s", $firstName, $middleName, $lastName)),
            'email' => "admin@admin.com",
            'password' => bcrypt("admin"),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
