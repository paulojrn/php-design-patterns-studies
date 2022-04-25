<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use SplObserver;
use SplSubject;

class GenerateLogOrder implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        echo "GERANDO log do cliente {$subject->order->clientName}\n";
    }
}
