<?php

namespace Study\DesignPattern;

class DiscountCalculator
{
    public function calculate(Budget $budget): float
    {
        $discount = 0;

        /* Problema:
            * Pode crescer pra sempre.
            * Muitos ifs.
            * Lógica dos ifs utilizam parâmetros de budget diferentes (budget não sabe a estratégia para diferentes descontos).
            * Estratégia de desconto precisa ser calculada pois é preciso definir qual desconto de acordo com orçamento.
            * Ordem importa.
        */

        if ($budget->value > 500) {
            $discount = 0.05;
        }

        if ($budget->itemAmount > 5) {
            $discount = 0.1;
        }

        return $budget->value * $discount;
    }
}
