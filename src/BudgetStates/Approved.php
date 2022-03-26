<?php

namespace Study\DesignPattern\BudgetStates;

use Study\DesignPattern\Budget;

class Approved extends BudgetStatesAbstract
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.02;
    }

    public function finalize(Budget $budget): void
    {
        $budget->state = new Finalized();
    }
}
