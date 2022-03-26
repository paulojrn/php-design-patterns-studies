<?php

namespace Study\DesignPattern\BudgetStates;

use DomainException;
use Study\DesignPattern\Budget;

class Reproved extends BudgetStatesAbstract
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new DomainException("um orçamento reprovado não pode receber descontos.");
    }

    public function finalize(Budget $budget): void
    {
        $budget->state = new Finalized();
    }
}
