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
                    'quantity' => 1,
                    'unit_price' => 50.5,
                    'total' => 50.5,
                ],
            ])
            ->create();
    }
}
