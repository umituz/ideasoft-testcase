<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\BaseController;
use App\Services\Base\DiscountService;

class OrderDiscountsController extends BaseController
{
    private DiscountService $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function index($orderId)
    {
        $data = $this->discountService->applyDiscount($orderId);

        return $this->ok(
            data: $data
        );
    }
}
