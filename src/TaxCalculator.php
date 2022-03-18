<?php

namespace Study\DesignPattern;

use Study\DesignPattern\Taxes\ITaxStrategy;

class TaxCalculator
{
    public function calculate(Budget $budget, ITaxStrategy $tax): float
    {
        return $tax->calculate($budget);
    }
}
