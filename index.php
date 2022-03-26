<?php

use Study\DesignPattern\Test\TestBehavioral;

require "vendor/autoload.php";

echo "\n";
TestBehavioral::testStrategy();
echo "\n";
TestBehavioral::testChainOfResponsibility();
echo "\n";
TestBehavioral::testTemplateMethod();
echo "\n";
TestBehavioral::testState();
echo "\n";