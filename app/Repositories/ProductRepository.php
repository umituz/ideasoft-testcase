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
}
