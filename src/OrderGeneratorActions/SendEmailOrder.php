<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use SplObserver;
use SplSubject;

class SendEmailOrder implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        echo "ENVIANDO email para o cliente {$subject->order->clientName}\n";
    }
}
