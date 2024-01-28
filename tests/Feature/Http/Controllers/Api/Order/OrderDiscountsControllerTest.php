<?php

namespace Feature\Http\Controllers\Api\Order;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderDiscountsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_apply_discount_to_order()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);
        $order = Order::factory()->create([
            'items' => json_encode([
                [
                    'product_id' => $product->id,
                    'quantity' => 5,
                    'unit_price' => $product->price,
                    'total' => 5 * $product->price,
                ],
            ]),
            'total' => 5 * $product->price,
        ]);

        $this->mock(\App\Services\Base\ProductService::class, function ($mock) use ($category, $product) {
            $mock->shouldReceive('find')->with($product->id)->andReturn($product);
            $mock->shouldReceive('getCategoryItemPrice')->with($category->id)->andReturn($product->price);
            $mock->shouldReceive('getMinPriceItem')->with($category->id)->andReturn($product);
        });

        $response = $this->getJson("/api/orders/{$order->id}/discounts");

        $response->assertOk();
    }

    /** @test */
    public function it_returns_not_found_for_invalid_order_id()
    {
        $invalidOrderId = 999;

        $response = $this->getJson("/api/orders/{$invalidOrderId}/discounts");

        $response->assertNotFound();
    }
}
