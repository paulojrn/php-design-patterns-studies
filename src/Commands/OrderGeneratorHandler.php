<?php

namespace Study\DesignPattern\Commands;

use DateTimeImmutable;
use Study\DesignPattern\{Budget, Order};
use Study\DesignPattern\OrderGeneratorActions\OrderGeneratorActionsInterface;

class OrderGeneratorHandler implements HandlerInterface
{
    /**
     * @var OrderGeneratorCommand $orderGenerator
     */
    private OrderGeneratorCommand $orderGenerator;

    /**
     * @var OrderGeneratorActionsInterface[]
     */
    private array $actions = [];

    public function __construct(OrderGeneratorCommand $orderGenerator)
    {
        $this->orderGenerator = $orderGenerator;
    }

    public function addAction(OrderGeneratorActionsInterface $action)
    {
        $this->actions[] = $action;    
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

        foreach ($this->actions as $action) {
            $action->executeAction($order);
        }

        echo $order;
    }
}
