<?php

namespace Study\DesignPattern\Commands;

use DateTimeImmutable;
use Study\DesignPattern\{Budget, Order};
use Study\DesignPattern\OrderGeneratorActions\CreateDatabaseOrder;
use Study\DesignPattern\OrderGeneratorActions\GenerateLogOrder;
use Study\DesignPattern\OrderGeneratorActions\SendEmailOrder;

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

        $createDBOrder = new CreateDatabaseOrder();
        $generateLogOrder = new GenerateLogOrder();
        $sendEmailOrder = new SendEmailOrder();

        $createDBOrder->executeAction($order);
        $generateLogOrder->executeAction($order);
        $sendEmailOrder->executeAction($order);

        echo "===============\n";

        echo $order;
    }
}
