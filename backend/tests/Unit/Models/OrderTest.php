<?php

namespace Tests\Unit\Models;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_customer()
    {
        $order = Order::factory()->create();
        $customer = Customer::factory()->create();

        $order->customer()->associate($customer)->save();

        $this->assertInstanceOf(Customer::class, $order->customer);
        $this->assertEquals($customer->name, $order->customer->name);
    }
}
