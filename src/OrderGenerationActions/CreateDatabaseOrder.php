<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use Study\DesignPattern\Order;

class CreateDatabaseOrder
{
    public function executeAction(Order $order)
    {
        echo "Salvando pedido do cliente {$order->clientName} no banco de dados";
    }
}
