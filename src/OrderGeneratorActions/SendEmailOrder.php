<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use Study\DesignPattern\Order;

class SendEmailOrder implements OrderGeneratorActionsInterface
{
    public function executeAction(Order $order): void
    {
        echo "ENVIANDO email para o cliente {$order->clientName}\n";
    }
}
