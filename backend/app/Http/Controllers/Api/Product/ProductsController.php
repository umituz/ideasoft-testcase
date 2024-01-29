<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Api\BaseController;
use App\Services\Base\ProductService;
use Illuminate\Http\Request;

class ProductsController extends BaseController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $items = $this->productService->getAllElasticData($request);

        return $this->ok(
            data: $items
        );
    }

    public function show($slug)
    {
        $item = $this->productService->findBy('slug', $slug);

        if (! $item) {
            return $this->notFound();
        }

        return $this->ok($item, __('Product Detail'));
    }
}
