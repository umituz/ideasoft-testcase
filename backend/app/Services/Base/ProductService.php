<?php

namespace App\Services\Base;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepositoryInterface;

class ProductService
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllElasticData($request): ProductCollection
    {
        $searchTerm = '*';

        if ($request->has('categoryId')) {
            $searchTerm = "category_id:({$request->input('categoryId')})";
        }

        if ($request->has('searchTerm')) {
            $searchTerm = "name:({$request->input('searchTerm')})";
        }

        $items = $this->productRepository->getElasticsearchData($searchTerm);

        return new ProductCollection($items);
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

    public function getProductListResource()
    {
        $items = $this->productRepository->getWithCategories();

        return new ProductCollection($items);
    }

    public function findBy($key, $value)
    {
        $item = $this->productRepository->findBy($key, $value);

        if ($item) {
            $item->load('category');

            return new ProductResource($item);
        }

        return null;
    }
}
