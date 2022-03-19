<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

class Ikcv implements TaxStrategyInterface
{
    public function calculate(Budget $budget): float
    {
        if ($budget->value > 300 && $budget->itemAmount > 3) {
            return $budget->value * 0.04;
        }

        return $budget->value * 0.025;
    }
}
