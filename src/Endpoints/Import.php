<?php

namespace Shokme\Actito\Endpoints;

use GuzzleHttp\Psr7\Utils;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;

class Import
{
    public function __construct(private PendingRequest $client)
    {
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4#operation/profiletables-import-create
     * @link https://developers.actito.com/api-reference/data-v4#operation/customtables-import-create
     * @param  string  $table set 'profile' to import profile data else set '$table' name
     * @param  string|array  $config configuration array or file configuration path
     */
    public function create(string $table, string $filePath, string|array $config, array $queryParameters): Response
    {
        $table = $table === 'profile' ? 'table/'.config('actito.profile_table') : "customTable/$table";
        $data = $this->payload($filePath, $config);

        $params = '';
        if ($queryParameters) {
            $params = '?'.Arr::query($queryParameters);
        }

        return $this->client->post('v4/entity/'.config('actito.entity').'/'.$table.'/import'.$params, $data);
    }

    private function payload(string $filePath, string|array $config): array
    {
        return [
            'multipart' => [
                [
                    'name' => 'inputFile',
                    'contents' => Utils::tryFopen($filePath, 'r'),
                ],
                [
                    'name' => 'parameters',
                    'contents' => ! is_array($config) ? Utils::tryFopen($config, 'r') : $config,
                ]
            ]
        ];
    }
}
