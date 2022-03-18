<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

class Iss implements TaxStrategyInterface
{
    public function calculate(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}
