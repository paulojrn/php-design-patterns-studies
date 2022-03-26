<?php

namespace Study\DesignPattern\BudgetStates;

use DomainException;
use Study\DesignPattern\Budget;

abstract class BudgetStatesAbstract
{
    protected string $stateName;

    /**
     * @throws DomainException
     */
    abstract public function calculateExtraDiscount(Budget $budget): float;

    public function getName(): string
    {
        return $this->stateName;
    }

    public function approve(Budget $budget): void
    {
        throw new DomainException("Este orçamento não pode ser aprovado.");
    }

    public function reprove(Budget $budget): void
    {
        throw new DomainException("Este orçamento não pode ser reprovado.");
    }

    public function finalize(Budget $budget): void
    {
        throw new DomainException("Este orçamento não pode ser finalizado.");
    }
}
