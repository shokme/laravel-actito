<?php

namespace Shokme\Actito\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response participation(string $form, int $id)
 * @see \Shokme\Actito\Endpoints\Form
 */
class Form extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito-form';
    }
}
