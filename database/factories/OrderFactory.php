<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'items' => $this->generateOrderItems(),
            'total' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }

    private function generateOrderItems()
    {
        $items = [];
        $numItems = $this->faker->numberBetween(1, 5);

        for ($i = 0; $i < $numItems; $i++) {
            $items[] = [
                'product_id' => $this->faker->numberBetween(1, 100),
                'quantity' => $this->faker->numberBetween(1, 10),
            ];
        }

        return json_encode($items);
    }
}
