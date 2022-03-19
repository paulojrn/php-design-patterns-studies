<?php

namespace Study\DesignPattern\Taxes;

use Study\DesignPattern\Budget;

abstract class TaxWith2AliquotAbstract implements TaxStrategyInterface
{
    public function calculate(Budget $budget): float
    {
        if ($this->isMaxTax($budget)) {
            return $this->calculateWithMaxTax($budget);
        }

        return $this->calculateWithMinTax($budget);
    }

    abstract protected function isMaxTax(Budget $budget): bool;
    abstract protected function calculateWithMaxTax(Budget $budget): float;
    abstract protected function calculateWithMinTax(Budget $budget): float;
}
