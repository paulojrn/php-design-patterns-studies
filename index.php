<?php

require "vendor/autoload.php";

use Study\DesignPattern\Budget;
use Study\DesignPattern\DiscountCalculator;
use Study\DesignPattern\TaxCalculator;
use Study\DesignPattern\Taxes\Icms;
use Study\DesignPattern\Taxes\Iss;

/* Start Behavioral/Strategy */
$budget = new Budget();
$budget->value = 100;

$calculator = new TaxCalculator();
$value = $calculator->calculate($budget, new Icms());
var_dump($value);
/* End Behavioral/Strategy */
/* Start Behavioral/ChainOfResponsibility */
$budget = new Budget();
$budget->value = 200;
$budget->itemAmount = 7;

$calculator = new DiscountCalculator();
$value = $calculator->calculate($budget);
var_dump($value);
/* End Behavioral/ChainOfResponsibility */