<?php

namespace Study\DesignPattern;

class TaxCalculator
{
    public function calculate(Budget $budget, string $taxType): float
    {
        /* Problemas:
            * Crescer para sempre (adição de novos impostos)
            * Não tem regra para garantir só impostos válidos
        */
        switch ($taxType) {
            case "ICMS":
                return $budget->value * 0.1;
                break;
            case "ISS":
                return $budget->value * 0.06;
        }
    }
}
