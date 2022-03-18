<?php

namespace Study\DesignPattern\Discount;

use Study\DesignPattern\Budget;

class ItemDiscount extends DiscountAbstract
{
    private int $itemAmountLimit = 20;

    public function calculate(Budget $budget): float
    {
        if ($budget->itemAmount > $this->itemAmountLimit) {
            return $budget->value * 0.1;
        }

        return $this->nextDiscount->calculate($budget);
    }

    public function setItemAmountLimit(int $itemAmountLimit): self
    {
        $this->itemAmountLimit = $itemAmountLimit;

        return $this;
    }
}
