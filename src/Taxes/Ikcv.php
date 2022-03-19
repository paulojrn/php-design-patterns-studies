<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

class Ikcv extends TaxWith2AliquotAbstract
{
    protected function isMaxTax(Budget $budget): bool
    {
        return $budget->value > 300 && $budget->itemAmount > 3;
    }

    protected function calculateWithMaxTax(Budget $budget): float
    {
        return $budget->value * 0.04;
    }

    protected function calculateWithMinTax(Budget $budget): float
    {
        return $budget->value * 0.025;
    }
}
