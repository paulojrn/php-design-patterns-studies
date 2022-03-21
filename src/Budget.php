<?php

namespace Study\DesignPattern;

use DomainException;

class Budget
{
    public int $itemAmount;
    public float $value;
    public string $status;

    public function applyExtraDiscount()
    {
        $this->value = $this->calculateExtraDiscount();
    }

    public function calculateExtraDiscount()
    {
        if ($this->status === "EM_APROVACAO") {
            return $this->value * 0.05;
        }

        if ($this->state === "APROVADO") {
            return $this->value * 0.02;
        }

        throw new DomainException("Orçamentos aprovados e finalizados não podem recerber descontos");
    }
}
