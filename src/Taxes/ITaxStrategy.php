<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

interface ITaxStrategy
{
    public function calculate(Budget $budget): float;
}
