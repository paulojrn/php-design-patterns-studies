<?php

namespace Study\DesignPattern\Test;

use Study\DesignPattern\Budget;
use Study\DesignPattern\Commands\OrderGeneratorCommand;
use Study\DesignPattern\Commands\OrderGeneratorHandler;
use Study\DesignPattern\DiscountCalculator;
use Study\DesignPattern\OrderGeneratorActions\CreateDatabaseOrder;
use Study\DesignPattern\OrderGeneratorActions\GenerateLogOrder;
use Study\DesignPattern\OrderGeneratorActions\SendEmailOrder;
use Study\DesignPattern\TaxCalculator;
use Study\DesignPattern\Taxes\Icms;
use Study\DesignPattern\Taxes\Icpp;
use Study\DesignPattern\Taxes\Ikcv;
use Study\DesignPattern\Taxes\Iss;

final class TestBehavioral
{
    private function __construct() {}

    public static function testStrategy(): void
    {
        var_dump("=== Start Strategy ===");
        $budget = new Budget(100, 3);

        $calculator = new TaxCalculator();
        $value = $calculator->calculate($budget, new Icms());
        var_dump("Tax Value: $value");
        var_dump("=== End Strategy ===");
    }

    public static function testChainOfResponsibility(): void
    {
        var_dump("=== Start Chain of Responsability ===");
        $budget = new Budget(300, 7);

        $calculator = new DiscountCalculator();
        $value = $calculator->calculate($budget);
        var_dump("Discount Value: $value");
        var_dump("=== End Chain of Responsability ===");
    }

    public static function testTemplateMethod(): void
    {
        var_dump("=== Start Template Method ===");
        $budget = new Budget(100, 5);

        $calculator = new TaxCalculator();
        $value = $calculator->calculate($budget, new Ikcv());
        var_dump("Tax Value: $value");
        var_dump("=== End Template Method ===");
    }

    public static function testState(): void
    {
        var_dump("=== Start State ===");
        $budget = new Budget(100, 5);

        var_dump($budget->getState()->getName());
        $budget->approve();
        var_dump($budget->getState()->getName());
        $budget->finalize();
        var_dump($budget->getState()->getName());
        var_dump("=== End State ===");
    }

    public static function testCommand(array $argv): void
    {
        var_dump("=== Start Command ===");
        $budgetValue = $argv[1];
        $budgetItemAmount = $argv[2];
        $clientName = $argv[3];

        $orderGenerator = new OrderGeneratorCommand(
            $budgetValue,
            $budgetItemAmount,
            $clientName
        );

        $handler = new OrderGeneratorHandler($orderGenerator);
        $handler->execute();
        var_dump("=== End Command ===");
    }

    public static function testObserver(array $argv): void
    {
        var_dump("=== Start Observer ===");
        $budgetValue = $argv[1];
        $budgetItemAmount = $argv[2];
        $clientName = $argv[3];

        $orderGenerator = new OrderGeneratorCommand(
            $budgetValue,
            $budgetItemAmount,
            $clientName
        );

        $handler = new OrderGeneratorHandler($orderGenerator);
        $handler->addAction(new CreateDatabaseOrder());
        $handler->addAction(new GenerateLogOrder());
        $handler->addAction(new SendEmailOrder());
        $handler->execute();
        var_dump("=== End Observer ===");
    }
}
