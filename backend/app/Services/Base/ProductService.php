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

    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function getCategoryItemPrice($categoryId)
    {
        return $this->productRepository->getCategoryItemPrice($categoryId);
    }

    public function getMinPriceItem($categoryId)
    {
        return $this->productRepository->getMinPriceItem($categoryId);
    }
}
