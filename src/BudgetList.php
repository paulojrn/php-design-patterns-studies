<?php

namespace Study\DesignPattern;

use ArrayIterator;
use IteratorAggregate;
use Study\DesignPattern\BudgetStates\Finalized;
use Traversable;

class BudgetList implements IteratorAggregate
{
    /**
     * @var Budget[]
     */
    private array $budgets = [];

    public function add(Budget $budget): self
    {
        $this->budgets[] = $budget;
        return $this;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->budgets);
    }

    public function getFinalizedBudgets(): Traversable
    {
        $finalizedBudgets = array_filter(
            $this->budgets,
            fn($budget) => get_class($budget->getState()) === Finalized::class
        );
        
        return new ArrayIterator($finalizedBudgets);
    }
}
