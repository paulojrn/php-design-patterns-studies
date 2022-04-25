<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use Study\DesignPattern\Order;

class CreateDatabaseOrder implements OrderGeneratorActionsInterface
{
    public function executeAction(Order $order): void
    {
        echo "CRIANDO pedido do cliente {$order->clientName} no banco de dados\n";
    }
}
