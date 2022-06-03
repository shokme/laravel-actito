<?php

namespace Shokme\Actito\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response create(string $table, string $filePath, string|array $config, array $queryParameters)
 * @see \Shokme\Actito\Endpoints\Import
 */
class Import extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito-import';
    }
}
