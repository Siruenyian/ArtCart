<?php

namespace App\Infrastructure\Repository\MySQL;

use App\Core\Models\Order\Order;
use App\Core\Models\Order\OrderId;
use App\Core\Models\User\UserId;
use Illuminate\Support\Facades\DB;

class OrderRepository implements \App\Core\Repository\OrderRepositoryInterface
{

    public function byId(OrderId $id): ?Order
    {
        // TODO: Implement byId() method.
        $row = DB::table('order')->where('order_id', $id->id())->first();
        if (!$row) return null;
        return new Order(new OrderId($row->order_id), $row->final_total, $row->shipment_fee, $row->origin, $row->destination, $row->status);
    }

    public function save(Order $order): void
    {
        // TODO: Implement save() method.
        $payload = $this->constructPayloadWithoutId($order);
        $payload['order_id'] = $order->getId();
        DB::table('order')->insert($payload);
    }

    public function show(UserId $userId): array
    {
        // TODO: Implement show() method.
        //add order status too in table
        $sql = "SELECT p.name, cd.price, cd.quantity, o.final_total
        FROM cart_details cd
        INNER JOIN orders o ON cd.user_id=o.sell_user_id
        INNER JOIN product p ON cd.user_id=p.user_id
        WHERE cd.user_id=:id_user";

        $row = DB::select($sql, [
            'id_user' => $userId->id()
        ]);

        $orderList = array();

        foreach ($row as $order) {
            $orderList[] = (object)array('name' => $order->name, 'price' => $order->price, 'qty' => $order->quantity, 'status' => Order::SELESAI, 'final_total' => $order->final_total);
        }

        return $orderList;
    }

    public function update(Order $order): void
    {
        // TODO: Implement update() method.
        $payload = $this->constructPayloadWithoutId($order);
        $payload['order_id'] = $order->getId();
        DB::table('order')
            ->where('order_id', $order->getId())
            ->update($payload);
    }
    private function constructPayloadWithoutId(Order $order)
    {
        // might throw error
        return [
            "final_total" => $order->getFinalTotal(),
            "shipment_fee" => $order->getShipmentFee(),
            "origin" => $order->getOrigin(),
            "destination" => $order->getDestination(),
            "status" => $order->getStatus(),
        ];
    }
}
