<?php

namespace Study\DesignPattern\BudgetStates;

use DomainException;
use Study\DesignPattern\Budget;

class Finalized extends BudgetStatesAbstract
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new DomainException("Um orçamento finalizado não pode receber descontos.");
    }
}
