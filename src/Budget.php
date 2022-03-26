<?php

namespace Study\DesignPattern;

use Study\DesignPattern\BudgetStates\BudgetStatesAbstract;
use Study\DesignPattern\BudgetStates\OnApproval;

class Budget
{
    public int $itemAmount;
    public float $value;
    public BudgetStatesAbstract $state;

    public function __construct(float $value, int $itemAmount)
    {
        $this->state = new OnApproval();
        $this->itemAmount = $itemAmount;
        $this->value = $value;
    }

    public function applyExtraDiscount(): void
    {
        $this->value -= $this->state->calculateExtraDiscount($this);
    }

    public function getState(): BudgetStatesAbstract
    {
        return $this->state;
    }

    public function approve(): void
    {
        $this->state->approve($this);
    }

    public function reprove(): void
    {
        $this->state->reprove($this);
    }

    public function finalize(): void
    {
        $this->state->finalize($this);
    }
}
