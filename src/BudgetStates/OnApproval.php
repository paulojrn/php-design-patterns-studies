<?php

namespace Study\DesignPattern\BudgetStates;

use Study\DesignPattern\Budget;

class OnApproval extends BudgetStatesAbstract
{
    public function __construct()
    {
        $this->stateName = "On Approval";
    }

    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.05;
    }

    public function approve(Budget $budget): void
    {
        $budget->state = new Approved();
    }

    public function reprove(Budget $budget): void
    {
        $budget->state = new Reproved();
    }
}
