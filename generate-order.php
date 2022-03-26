<?php

require_once "vendor/autoload.php";

use Study\DesignPattern\Budget;
use Study\DesignPattern\Order;

$budgetValue = $argv[1];
$budgetItemAmount = $argv[2];
$clientName = $argv[3];

$budget = new Budget($budgetValue, $budgetItemAmount);
$order = new Order();
$order->finishDate = new DateTimeImmutable();
$order->clientName = $clientName;
$order->budget = $budget;