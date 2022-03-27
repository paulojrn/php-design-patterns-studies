<?php

namespace Study\DesignPattern;

use DateTimeImmutable;

class OrderGenerator implements CommandInterface
{
    private float $budgetValue;
    private int $budgetItemAmount;
    private string $clientName;

    public function __construct(
        float $budgetValue,
        int $budgetItemAmount,
        string $clientName
    ) {
        $this->budgetValue = $budgetValue;
        $this->budgetItemAmount = $budgetItemAmount;
        $this->clientName = $clientName;
    }

    public function execute(): void
    {
        $order = new Order(
            $this->clientName,
            new DateTimeImmutable(),
            new Budget($this->budgetValue, $this->budgetItemAmount)
        );

        echo $order;
    }
}
