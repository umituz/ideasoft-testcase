<?php

namespace App\Services\Base;

use App\Repositories\ProductRepositoryInterface;

class ProductService
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function get()
    {
        return $this->productRepository->get();
    }
}
