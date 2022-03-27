<?php

namespace Study\DesignPattern\Commands;

class OrderGeneratorCommand
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

    public function getValue(): float
    {
        return $this->budgetValue;
    }

    public function getItemAmount(): int
    {
        return $this->budgetItemAmount;
    }

    public function getClientName(): string
    {
        return $this->clientName;
    }
}
