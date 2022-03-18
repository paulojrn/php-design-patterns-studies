<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

interface TaxStrategyInterface
{
    public function calculate(Budget $budget): float;
}
