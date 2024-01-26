<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory(3)->create();

        DB::table('users')->delete();

        DB::table('users')->insert(array (
                array (
                    'name' => 'Ümit UZ',
                    'email' => 'umituz998@gmail.com',
                    'email_verified_at' => '2024-01-26 17:03:09',
                    'password' => bcrypt(123456789),
                    'remember_token' => 'qOBwUS4j8R',
                    'created_at' => '2024-01-26 17:03:09',
                    'updated_at' => '2024-01-26 17:03:09',
                ),
        ));
    }
}
