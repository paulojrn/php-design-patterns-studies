<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use Study\DesignPattern\Order;

class GenerateLogOrder
{
    public function executeAction(Order $order)
    {
        echo "Gerando log do cliente {$order->clientName}";
    }
}
