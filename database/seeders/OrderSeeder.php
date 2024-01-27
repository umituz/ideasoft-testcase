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

        Order::factory()
            ->withCustomerId(1)
            ->withItems([
                [
                    'product_id' => 1,
                    'quantity' => 2,
                    'unit_price' => 1000,
                    'total' => 200,
                ],
            ])
            ->withTotal(2000)
            ->create();
    }
}
