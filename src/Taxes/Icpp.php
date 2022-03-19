<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

class Icpp implements TaxStrategyInterface
{
    public function calculate(Budget $budget): float
    {
        if ($budget->value > 500) {
            return $budget->value * 0.03;
        }

        return $budget->value * 0.02;
    }
}
