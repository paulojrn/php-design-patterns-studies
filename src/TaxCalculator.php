<?php

namespace Study\DesignPattern;

use Study\DesignPattern\Taxes\TaxStrategyInterface;

class TaxCalculator
{
    public function calculate(Budget $budget, TaxStrategyInterface $tax): float
    {
        return $tax->calculate($budget);
    }
}
