<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use Study\DesignPattern\Order;

class SendEmailOrder
{
    public function executeAction(Order $order)
    {
        echo "Enviando email para o cliente {$order->clientName}";
    }
}
