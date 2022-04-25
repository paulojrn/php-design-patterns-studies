<?php

namespace Study\DesignPattern\OrderGeneratorActions;

use SplObserver;
use SplSubject;

class CreateDatabaseOrder implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        echo "CRIANDO pedido do cliente {$subject->order->clientName} no banco de dados\n";
    }
}
