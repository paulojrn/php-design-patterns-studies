<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use Study\DesignPattern\Order;

class GenerateLogOrder implements OrderGeneratorActionsInterface
{
    public function executeAction(Order $order): void
    {
        echo "GERANDO log do cliente {$order->clientName}\n";
    }
}
