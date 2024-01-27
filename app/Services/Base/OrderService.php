<?php

namespace App\Services\Base;

use App\Http\Resources\OrderResource;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getOrderListResource(): AnonymousResourceCollection
    {
        $items = $this->orderRepository->get();

        return OrderResource::collection($items);
    }

    /**
     * @param $id
     * @return OrderResource
     */
    public function getOrder($id): OrderResource
    {
        $item = $this->orderRepository->find($id);

        return new OrderResource($item);
    }

    public function createOrder($data)
    {
        $item = $this->orderRepository->create([
            'customer_id' => $data['customer_id'],
            'total' => $data['total'],
            'items' => json_encode($data['items'])
        ]);

        return new OrderResource($item);
    }

    public function destroyOrder($id)
    {
        $item = $this->orderRepository->find($id);
        $item->delete();

        return true;
    }

    public function find($id)
    {
        return $this->orderRepository->find($id);
    }
}
