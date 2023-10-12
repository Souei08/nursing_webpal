<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ User, Industry, SoftSkill };
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Helpers\Utils;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $password = '123456789';
        $verified = Carbon::now();

        $data = [
            [
                'is_super' => 1,
                'role_id' => 1,
                'status' => 'Active',
                'first_name' => 'Test',
                'last_name' => 'Admin',
                'photo' => null,
                'email' => 'admin@umindanao.edu.ph',
                'password' => Hash::make($password),
                'email_verified_at' => $verified,
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            $user = User::create($data[$i]);
        }
    }
}
