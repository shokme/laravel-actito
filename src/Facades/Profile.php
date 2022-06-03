<?php

namespace Shokme\Actito\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response all(array $queryParameters = [])
 * @method static Response find(string $businessKey)
 * @method static Response firstOrCreate(string $email, array $data)
 * @method static Response updateOrCreate(array $data)
 * @method static Response delete(int $id)
 * @see \Shokme\Actito\Endpoints\Profile
 */
class Profile extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito-profile';
    }
}
