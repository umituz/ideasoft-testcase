<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('orders')->delete();

        $orders = [
            [
                'customer_id' => 1,
                'items' => [
                    ['product_id' => 1, 'quantity' => 10],
                ],
            ],
            [
                'customer_id' => 2,
                'items' => [
                    ['product_id' => 2, 'quantity' => 2],
                    ['product_id' => 3, 'quantity' => 1],
                ],
            ],
            [
                'customer_id' => 3,
                'items' => [
                    ['product_id' => 4, 'quantity' => 6],
                    ['product_id' => 5, 'quantity' => 10],
                ],
            ],
        ];

        foreach ($orders as $order) {
            $orderItems = [];
            $orderTotal = 0;

            foreach ($order['items'] as $item) {
                $product = Product::find($item['product_id']);

                if ($product) {
                    $unitPrice = $product->price;
                    $total = $unitPrice * $item['quantity'];

                    $orderItems[] = [
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'unit_price' => $unitPrice,
                        'total' => number_format($total, 2, '.', ''),
                    ];

                    $orderTotal += $total;
                } else {
                    $this->command->error("Invalid product ID: {$item['product_id']} in order for customer ID: {$order['customer_id']}");
                }
            }

            if (count($orderItems) > 0) {
                $orderData = [
                    'customer_id' => $order['customer_id'],
                    'items' => json_encode($orderItems),
                    'total' => number_format($orderTotal, 2, '.', ''),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                \DB::table('orders')->insert($orderData);
            }
        }
    }
}
