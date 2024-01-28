<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Order::factory(3)->create();

        //Order::factory()
        //   ->withCustomerId(1)
        //   ->withItems([
        //       [
        //           'product_id' => 1,
        //           'quantity' => 2,
        //           'unit_price' => 1000,
        //           'total' => 200,
        //       ],
        //   ])
        //   ->withTotal(2000)
        //   ->create();

        //Order::factory()
        //    ->withCustomerId(1)
        //    ->withItems([
        //       [
        //            'product_id' => 2,
        //           'quantity' => 6,
        //           'unit_price' => 1000,
        //           'total' => 6000,
        //       ],
        //   ])
        //   ->withTotal(6000)
        //   ->create();

        \DB::table('orders')->delete();

        \DB::table('orders')->insert([
            [
                'id' => 1,
                'customer_id' => 1,
                'items' => json_encode([
                    [
                        'product_id' => 102,
                        'quantity' => 10,
                        'unit_price' => '11.28',
                        'total' => '112.80',
                    ],
                ]),
                'total' => '112.80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'customer_id' => 2,
                'items' => json_encode([
                    [
                        'product_id' => 101,
                        'quantity' => 2,
                        'unit_price' => '49.50',
                        'total' => '99.00',
                    ],
                    [
                        'product_id' => 100,
                        'quantity' => 1,
                        'unit_price' => '120.75',
                        'total' => '120.75',
                    ],
                ]),
                'total' => '219.75',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'customer_id' => 3,
                'items' => json_encode([
                    [
                        'product_id' => 102,
                        'quantity' => 6,
                        'unit_price' => '11.28',
                        'total' => '67.68',
                    ],
                    [
                        'product_id' => 100,
                        'quantity' => 10,
                        'unit_price' => '120.75',
                        'total' => '1207.50',
                    ],
                ]),
                'total' => '1275.18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
