<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OrderRequest;
use App\Services\Base\OrderService;

class OrdersController extends BaseController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $items = $this->orderService->getOrderListResource();

        return $this->ok(
            data: $items
        );
    }

    public function show($id)
    {
        $item = $this->orderService->getOrder($id);

        return $this->ok(
            data: $item
        );
    }

    public function store(OrderRequest $request)
    {
        $item = $this->orderService->createOrder($request->validated());

        return $this->created(
            data: $item
        );
    }

    public function update(OrderRequest $request, $id)
    {
        $item = $this->orderService->updateOrder($id, $request->validated());

        return $this->ok(
            data: $item
        );
    }

    public function destroy($id)
    {
        $this->orderService->destroyOrder($id);

        return $this->noContent(
            data: []
        );
    }
}
