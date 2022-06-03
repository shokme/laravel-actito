<?php

namespace Shokme\Actito\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response all()
 * @method static Response find(int $id)
 * @method static Response create(array $data)
 * @method static Response update(int $id, array $data)
 * @method static Response delete(int $id)
 * @method static Response dailyErrors(int $id, Carbon $date)
 * @see \Shokme\Actito\Endpoints\Webhook
 */
class Webhook extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito-webhook';
    }
}
