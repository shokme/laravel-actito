<?php

namespace Shokme\Actito\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response all(string $table, array $queryParameters = [])
 * @method static Response find(string $table, string $businessKey)
 * @method static Response updateOrCreate(string $table, array $data = [])
 * @method static Response update(string $table, string $businessKey, array $data = [])
 * @method static Response delete(string $table, string $businessKey)
 * @see \Shokme\Actito\Endpoints\Table
 */
class Table extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito-table';
    }
}
