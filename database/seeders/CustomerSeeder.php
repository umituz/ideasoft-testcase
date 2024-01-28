<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Customer::factory(3)->create();

        \DB::table('customers')->delete();

        \DB::table('customers')->insert([
            [
                'id' => 1,
                'name' => 'Türker Jöntürk',
                'since' => '2014-06-28',
                'revenue' => '492.12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Kaptan Devopuz',
                'since' => '2015-01-15',
                'revenue' => '1505.95',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'İsa Sonuyumaz',
                'since' => '2016-02-11',
                'revenue' => '0.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
