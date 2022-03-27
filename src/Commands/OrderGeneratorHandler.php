<?php

namespace Study\DesignPattern\Commands;

use DateTimeImmutable;
use Study\DesignPattern\{Budget, Order};

class OrderGeneratorHandler implements HandlerInterface
{
    private OrderGeneratorCommand $orderGenerator;

    public function __construct(OrderGeneratorCommand $orderGenerator)
    {
        $this->orderGenerator = $orderGenerator;
    }

    public function execute(): void
    {
        $orderGenerator = $this->orderGenerator;
        
        $budget = new Budget(
            $orderGenerator->getValue(),
            $orderGenerator->getItemAmount());

        $order = new Order(
            $orderGenerator->getClientName(),
            new DateTimeImmutable(),
            $budget
        );

        echo $order;
    }
}
