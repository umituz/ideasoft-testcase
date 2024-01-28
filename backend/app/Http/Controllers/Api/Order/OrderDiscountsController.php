<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\BaseController;
use App\Services\Base\DiscountService;
use App\Services\Base\OrderService;

class OrderDiscountsController extends BaseController
{
    private DiscountService $discountService;

    private OrderService $orderService;

    public function __construct(
        OrderService $orderService,
        DiscountService $discountService
    ) {
        $this->discountService = $discountService;
        $this->orderService = $orderService;
    }

    public function index($orderId)
    {
        $order = $this->orderService->find($orderId);

        if (! $order) {
            return $this->notFound("Order with ID {$orderId} not found.");
        }

        $data = $this->discountService->applyDiscount($order);

        return $this->ok(
            data: $data
        );
    }
}
