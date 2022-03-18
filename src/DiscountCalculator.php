<?php

namespace Study\DesignPattern;

use Study\DesignPattern\Discount\ItemDiscount;
use Study\DesignPattern\Discount\NoDiscount;
use Study\DesignPattern\Discount\ValueDiscount;

class DiscountCalculator
{
    public function calculate(Budget $budget): float
    {
        /* Teste A */
        $chainOfDiscountsA = new ItemDiscount(new ValueDiscount());

        /* Teste B */
        $noDiscount = new NoDiscount();
        $valueDiscount = (new ValueDiscount($noDiscount))->setValueAmountLimit(200);
        $chainOfDiscountsB = (new ItemDiscount($valueDiscount))->setItemAmountLimit(3);

        /* Teste C */
        $itemDiscount = (new ItemDiscount($noDiscount))->setItemAmountLimit(3);
        $chainOfDiscountsC = (new ValueDiscount($itemDiscount))->setValueAmountLimit(200);

        return $chainOfDiscountsC->calculate($budget);
    }
}
