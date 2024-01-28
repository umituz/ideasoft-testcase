<?php

namespace Tests\Unit\Models;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_orders()
    {
        $customer = Customer::factory()->create();
        $order = Order::factory()->create(['customer_id' => $customer->id]);

        $this->assertInstanceOf(Order::class, $customer->orders->first());
        $this->assertEquals($order->order_number, $customer->orders->first()->order_number);
    }
}
