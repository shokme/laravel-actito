<?php

namespace Shokme\Actito\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Shokme\Actito\Endpoints\Profile profile()
 * @method static \Shokme\Actito\Endpoints\Table table()
 * @method static \Shokme\Actito\Endpoints\Email email()
 * @method static \Shokme\Actito\Endpoints\Webhook webhook()
 * @method static \Shokme\Actito\Endpoints\Action action()
 * @method static \Shokme\Actito\Endpoints\Import import()
 * @method static \Shokme\Actito\Endpoints\Form form()
 * @see \Shokme\Actito\Actito
 */
class Actito extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'actito';
    }
}
