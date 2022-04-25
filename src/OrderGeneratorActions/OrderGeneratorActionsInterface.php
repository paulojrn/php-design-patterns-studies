<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use Study\DesignPattern\Order;

interface OrderGeneratorActionsInterface
{
    public function executeAction(Order $order): void;
}