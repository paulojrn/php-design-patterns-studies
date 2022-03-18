<?php

namespace Study\DesignPattern\Discount;

use Study\DesignPattern\Budget;

class NoDiscount extends DiscountAbstract
{
    public function __construct()
    {
        
    }
    
    public function calculate(Budget $budget): float
    {
        return 0;
    }
}
