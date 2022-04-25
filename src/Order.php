<?php

namespace Study\DesignPattern;

use DateTimeInterface;

class Order
{
    public string $clientName;
    public DateTimeInterface $finishDate;
    public Budget $budget;

    public function __construct(
        string $clientName,
        DateTimeInterface $finishDate,
        Budget $budget
    ) {
        $this->clientName = $clientName;
        $this->finishDate = $finishDate;
        $this->budget = $budget;
    }

    public function __toString(): string
    {
        $name = $this->clientName;
        $date = $this->finishDate->format("d/m/Y");
        $value = $this->budget->value;
        $amount = $this->budget->itemAmount;

        return  "\nCliente: $name\n".
                "Data de finalização: $date\n".
                "Valor: $value\n".
                "Quantidade: $amount\n\n";
    }
}