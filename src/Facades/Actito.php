<?php

namespace Shokme\Actito\Facades;

use Illuminate\Support\Facades\Facade;

class Actito extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'actito';
    }
}
