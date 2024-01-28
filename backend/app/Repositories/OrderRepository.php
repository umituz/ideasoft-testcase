<?php

namespace App\Repositories;

use App\Models\Order;

/**
 * Class OrderRepository
 */
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    private Order $order;

    public function __construct(Order $order)
    {
        parent::__construct($order);

        $this->order = $order;
    }
}
