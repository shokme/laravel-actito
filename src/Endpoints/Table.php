<?php

namespace Shokme\Actito\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;

class Table
{
    public function __construct(private PendingRequest $client)
    {
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4#operation/customtables-records-get-list
     */
    public function all(string $table, array $queryParameters = []): Response
    {
        $params = '';
        if ($queryParameters) {
            $params = '?'.Arr::query($queryParameters);
        }

        return $this->client->get('v4/entity/'.config('actito.entity'.'/customTable/'.$table.'/record'.$params));
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4#operation/customtables-records-get-one
     */
    public function find(string $table, string $businessKey): Response
    {
        return $this->client->get('v4/entity/'.config('actito.entity'.'/customTable/'.$table.'/record/'.$businessKey));
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4/#operation/customtables-records-createorupdate
     */
    public function updateOrCreate(string $table, array $data = []): Response
    {
        $payload = [];

        if (! isset($data['properties'])) {
            $data['properties'] = $data;
        }

        foreach ($data['properties'] as $key => $value) {
            $payload['properties'][] = [
                'name' => $key,
                'value' => $value
            ];
        }

        return $this->client->post('v4/entity/'.config('actito.entity').'/customTable/'.$table.'/record', $payload);
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4#operation/customtables-records-update
     */
    public function update(string $table, string $businessKey, array $data = []): Response
    {
        $payload = [];

        if (isset($data['properties'])) {
            foreach ($data['properties'] as $key => $value) {
                $payload['properties'][] = [
                    'name' => $key,
                    'value' => $value
                ];
            }
        }

        return $this->client->put('v4/entity/'.config('actito.entity').'/customTable/'.$table.'/record/'.$businessKey, $payload);
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4#operation/customactions-delete
     */
    public function delete(string $table, string $businessKey): Response
    {
        return $this->client->delete('v4/entity/'.config('actito.entity').'/customTable/'.$table.'/record/'.$businessKey);
    }
}
