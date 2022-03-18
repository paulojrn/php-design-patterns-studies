<?php

require "vendor/autoload.php";

use Study\DesignPattern\Budget;
use Study\DesignPattern\TaxCalculator;
use Study\DesignPattern\Taxes\Icms;
use Study\DesignPattern\Taxes\Iss;

/* Start Behavioral/Strategy */
$budget = new Budget();
$budget->value = 100;

echo (new TaxCalculator())->calculate($budget, new Icms());
/* End Behavioral/Strategy */