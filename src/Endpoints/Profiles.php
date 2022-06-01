<?php

namespace Shokme\Actito\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;

class Profiles
{
    public function __construct(private PendingRequest $client)
    {
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v5/#operation/profiles-get-list
     */
    public function all(array $queryParameters = []): Response
    {
        $params = '';
        if ($queryParameters) {
            $params = '&'.Arr::query($queryParameters);
        }

        return $this->client->get('v5/entities/'.config('actito.entity').'/profile-tables/'.config('actito.profile_table')."/profiles$params");
    }

    public function find(array $queryParameters = []): Response
    {
        $params = '';
        if ($queryParameters) {
            $params = '&'.Arr::query($queryParameters);
        }

        return $this->client->get('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table')."/profile$params");
    }

    public function firstOrCreate(string $email, array $data): Response
    {
        $response =  $this->profile(['emailAddress' => $email]);

        return $response->successful() ? $response : $this->updateOrCreate($data);
    }

    public function updateOrCreate(array $data): Response
    {
        $payload = [];

        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $key => $value) {
                $payload['attributes'][] = [
                    'name' => $key,
                    'value' => $value
                ];
            }
        }

        return $this->client->post('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table').'/profile', $payload);
    }
}
