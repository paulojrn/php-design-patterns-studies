<?php

namespace Study\DesignPattern\Commands;

interface HandlerInterface
{
    public function execute(): void;
}