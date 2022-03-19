<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

class Icpp extends TaxWith2AliquotAbstract
{
    protected function isMaxTax(Budget $budget): bool
    {
        return $budget->value > 500;
    }

    protected function calculateWithMaxTax(Budget $budget): float
    {
        return $budget->value * 0.03;
    }

    protected function calculateWithMinTax(Budget $budget): float
    {
        return $budget->value * 0.02;
    }
}
