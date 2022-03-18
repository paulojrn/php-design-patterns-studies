<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

class Icms implements TaxStrategyInterface
{
    public function calculate(Budget $budget): float
    {
        return $budget->value * 0.1;
    }
}
