<?php

namespace Study\DesignPattern\Commands;

use DateTimeImmutable;
use SplObserver;
use SplSubject;
use Study\DesignPattern\{Budget, Order};

class OrderGeneratorHandler implements HandlerInterface, SplSubject
{
    /**
     * @var OrderGeneratorCommand
     */
    private OrderGeneratorCommand $orderGenerator;

    /**
     * @var Order
     */
    public Order $order;

    /**
     * @var SplObserver[]
     */
    private array $observers = [];

    public function __construct(OrderGeneratorCommand $orderGenerator)
    {
        $this->orderGenerator = $orderGenerator;
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void
    {
        if (($key = array_search($observer, $this->observers, true)) !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
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

        $this->order = $order;
        $this->notify();

        echo $order;
    }
}
