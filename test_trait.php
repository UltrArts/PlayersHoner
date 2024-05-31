<?php

require __DIR__.'/vendor/autoload.php';

use App\Traits\GeneratesCustomId;

class TestModel
{
    use GeneratesCustomId;
}

echo "Trait carregada com sucesso!";
