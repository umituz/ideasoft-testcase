<?php

namespace Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Services\Base\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdersControllerTest extends TestCase
{
    use RefreshDatabase;

    private OrderService $orderService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->orderService = app(OrderService::class);
    }

    /** @test */
    public function it_can_get_order_list()
    {
        $response = $this->getJson('/api/orders');

        $response->assertOk();
    }

    /** @test */
    public function it_can_get_order_by_id()
    {
        $order = Order::factory()->create();

        $response = $this->getJson("/api/orders/{$order->id}");

        $response->assertOk();
    }

    /** @test */
    /** @test */
    public function it_can_create_order()
    {
        $customer = Customer::factory()->create();
        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $orderData = [
            'customer_id' => $customer->id,
            'items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 2,
                    'unit_price' => 10.99,
                    'total' => 21.98
                ],
            ],
            'total' => 21.98,
        ];

        $response = $this->postJson('/api/orders', $orderData);

        $response->assertCreated();
    }


    /** @test */
    public function it_can_delete_order()
    {
        $order = Order::factory()->create();

        $response = $this->deleteJson("/api/orders/{$order->id}");

        $response->assertNoContent();
    }
}
