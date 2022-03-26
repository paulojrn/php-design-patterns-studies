<?php

namespace Study\DesignPattern;

use DateTimeInterface;

class Order
{
    public string $clientName;
    public DateTimeInterface $finishDate;
    public Budget $budget;
}