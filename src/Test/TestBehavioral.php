<?php

namespace Study\DesignPattern\Test;

use Study\DesignPattern\Budget;
use Study\DesignPattern\BudgetList;
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
        $observer1 = new CreateDatabaseOrder();
        $observer2 = new GenerateLogOrder();
        $observer3 = new SendEmailOrder();

        $handler->attach($observer1);
        $handler->attach($observer2);
        $handler->attach($observer3);
        $handler->execute();
        $handler->detach($observer1);
        $handler->detach($observer2);
        $handler->execute();
        var_dump("=== End Observer ===");
    }

    public static function testIterator(): void
    {
        var_dump("=== Start Iterator ===");

        /**
         * @var Budget $budget 
         */

        $budget1 = new Budget(1500.75, 7);
        $budget1->approve();
        $budget2 = new Budget(345.11, 10);
        $budget2->reprove();
        $budget3 = new Budget(3400.00, 2);
        $budget3->approve();
        $budget3->finalize();

        //$budgetList = [$budget1, $budget2, $budget3]; // pode causar problema caso adicione um item que não seja Budget
        $budgetList = new BudgetList();
        $budgetList->add($budget1)
            ->add($budget2)
            ->add($budget3);

        echo "\n";
        foreach ($budgetList->toArray() as $budget) {
            echo "Estado: " . $budget->getState()->getName() . "\n";
            echo "Valor: " . $budget->value . "\n";
            echo "Qtd. Itens: " . $budget->itemAmount . "\n";
            echo "\n";
        }

        var_dump("=== End Iterator ===");
    }
}
