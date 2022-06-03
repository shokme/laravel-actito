<?php

namespace Shokme\Actito\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Carbon;

class Webhook
{
    public function __construct(private PendingRequest $client)
    {
    }

    /**
     * @link https://developers.actito.com/api-reference/webhooks-v4#operation/webhooks-get-list
     */
    public function all(): Response
    {
        return $this->client->get('v4/entity/'.config('actito.entity').'/webhookSubscription');
    }

    /**
     * @link https://developers.actito.com/api-reference/webhooks-v4#operation/webhooks-get-one
     */
    public function find(int $id): Response
    {
        return $this->client->get('v4/entity/'.config('actito.entity').'/webhookSubscription/'.$id);
    }

    /**
     * @link https://developers.actito.com/api-reference/webhooks-v4#operation/webhooks-create
     */
    public function create(array $data): Response
    {
        return $this->client->post('v4/entity/'.config('actito.entity').'/webhookSubscription', $data);
    }

    /**
     * @link https://developers.actito.com/api-reference/webhooks-v4#operation/webhooks-update
     */
    public function update(int $id, array $data): Response
    {
        return $this->client->put('v4/entity/'.config('actito.entity').'/webhookSubscription/'.$id, $data);
    }

    /**
     * @link https://developers.actito.com/api-reference/webhooks-v4#operation/webhooks-delete
     */
    public function delete(int $id): Response
    {
        return $this->client->delete('v4/entity/'.config('actito.entity').'/webhookSubscription/'.$id);
    }

    /**
     * @link https://developers.actito.com/api-reference/webhooks-v4#operation/webhook-errors-get
     */
    public function dailyErrors(int $id, Carbon $date): Response
    {
        return $this->client->get('v4/entity/'.config('actito.entity').'/webhookSubscription/'.$id.'/'.$date->format('Y-m-d'));
    }
}
