<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Api\BaseController;
use App\Services\Base\CategoryService;

class CategoriesController extends BaseController
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $items = $this->categoryService->getCategoryListResource();

        return $this->ok(
            data: $items
        );
    }
}
