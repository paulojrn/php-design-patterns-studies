<?php

require "vendor/autoload.php";

use Study\DesignPattern\Budget;
use Study\DesignPattern\TaxCalculator;

$budget = new Budget();
$budget->value = 100;
$calculator = new TaxCalculator();

echo $calculator->calculate($budget, "ICMS");