<?php

namespace Shokme\Actito\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Action
{
    public function __construct(private PendingRequest $client)
    {
    }

    /**
     * @link https://developers.actito.com/api-reference/scenarios-v5#operation/customactions-get-list
     */
    public function all(): Response
    {
        return $this->client->get('v5/entities/'.config('actito.entity').'/custom-actions');
    }

    /**
     * @link https://developers.actito.com/api-reference/scenarios-v5#operation/customactions-get-one
     */
    public function find(string $id): Response
    {
        return $this->client->get('v5/entities/'.config('actito.entity').'/custom-actions/'.$id);
    }

    /**
     * @link https://developers.actito.com/api-reference/scenarios-v5#operation/customactions-create
     */
    public function create(array $data): Response
    {
        return $this->client->post('v5/entities/'.config('actito.entity').'/custom-actions', $data);
    }

    /**
     * @link https://developers.actito.com/api-reference/scenarios-v5/#operation/customactions-update-partial
     */
    public function update(int $id, array $data): Response
    {
        return $this->client->patch('v5/entities/'.config('actito.entity').'/custom-actions/'.$id, $data);
    }

    /**
     * @link https://developers.actito.com/api-reference/scenarios-v5/#operation/customactions-delete
     */
    public function delete(int $id): Response
    {
        return $this->client->delete('v5/entities/'.config('actito.entity').'/custom-actions/'.$id);
    }
}
