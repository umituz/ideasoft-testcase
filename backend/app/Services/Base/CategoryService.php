<?php

namespace App\Services\Base;

use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepositoryInterface;

class CategoryService
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function get()
    {
        return $this->categoryRepository->get();
    }

    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function getCategoryListResource()
    {
        $items = $this->categoryRepository->get();

        return CategoryResource::collection($items);
    }
}
