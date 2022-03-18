<?php

namespace Study\DesignPattern\Discount;

use Study\DesignPattern\Budget;

class ValueDiscount extends DiscountAbstract
{
    private float $valueAmountLimit = 1000;

    public function calculate(Budget $budget): float
    {
        if ($budget->value > $this->valueAmountLimit) {
            return $budget->value * 0.05;
        }

        return $this->nextDiscount->calculate($budget);
    }

    public function setValueAmountLimit(float $valueAmountLimit): self
    {
        $this->valueAmountLimit = $valueAmountLimit;

        return $this;
    }
}
