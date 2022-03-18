<?php

namespace Study\DesignPattern\Discount;

use Study\DesignPattern\Budget;

abstract class DiscountAbstract
{
    protected DiscountAbstract $nextDiscount;

    public function __construct(DiscountAbstract $nextDiscount = new NoDiscount())
    {
        $this->nextDiscount = $nextDiscount;
    }

    abstract public function calculate(Budget $budget): float;
}
