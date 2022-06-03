<?php

namespace Shokme\Actito\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response transactional(string $mail, array $data = [])
 * @method static Response profile(string $mail, int|string $profile, array $data)
 * @see \Shokme\Actito\Endpoints\Email
 */
class Email extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito-email';
    }
}
