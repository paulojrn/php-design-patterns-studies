<?php

namespace Study\DesignPattern;

class BudgetList
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

    public function toArray(): array
    {
        return $this->budgets;
    }
}
