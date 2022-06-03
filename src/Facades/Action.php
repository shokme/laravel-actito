<?php

namespace Shokme\Actito\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response all()
 * @method static Response find(string $id)
 * @method static Response create(array $data)
 * @method static Response update(string $id, array $data)
 * @method static Response delete(string $id)
 * @see \Shokme\Actito\Endpoints\Action
 */
class Action extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito-action';
    }
}
