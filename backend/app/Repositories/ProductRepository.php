<?php

namespace App\Repositories;

use App\Models\Product;

/**
 * Class ProductRepository
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    private Product $product;

    public function __construct(Product $product)
    {
        parent::__construct($product);

        $this->product = $product;
    }

    public function getCategoryItemPrice($categoryId)
    {
        $product = $this->product->where('category_id', $categoryId)->first();

        return $product ? $product->price : 0;
    }

    public function getMinPriceItem($categoryId)
    {
        return $this->product->where('category_id', $categoryId)->orderBy('price', 'asc')->first();
    }

    public function getWithCategories()
    {
        return $this->product->with('category')->paginate(2);
    }

    public function getElasticsearchData($searchTerm)
    {
        return $this->product
            ->search($searchTerm)
            ->orderBy('id', 'desc')
            ->paginate(5);
    }
}
