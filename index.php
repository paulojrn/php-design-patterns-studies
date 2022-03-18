<?php

require "vendor/autoload.php";

use Study\DesignPattern\Budget;
use Study\DesignPattern\DiscountCalculator;
use Study\DesignPattern\TaxCalculator;
use Study\DesignPattern\Taxes\Icms;
use Study\DesignPattern\Taxes\Iss;

/* Start Behavioral/Strategy */
var_dump("=== Start Strategy ===");
$budget = new Budget();
$budget->value = 100;

$calculator = new TaxCalculator();
$value = $calculator->calculate($budget, new Icms());
var_dump("Tax Value: $value");
var_dump("=== End Strategy ===");
/* End Behavioral/Strategy */
/* Start Behavioral/ChainOfResponsibility */
var_dump("=== Start Chain of Responsability ===");
$budget = new Budget();
$budget->value = 300;
$budget->itemAmount = 7;

$calculator = new DiscountCalculator();
$value = $calculator->calculate($budget);
var_dump("Discount Value: $value");
var_dump("=== End Chain of Responsability ===");
/* End Behavioral/ChainOfResponsibility */