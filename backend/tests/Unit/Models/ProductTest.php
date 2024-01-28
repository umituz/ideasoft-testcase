<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_category()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();

        $product->category()->associate($category)->save();

        $this->assertInstanceOf(Category::class, $product->category);
        $this->assertEquals($category->name, $product->category->name);
    }
}
