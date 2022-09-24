<?php

namespace Shokme\Actito\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;

class Profile
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
            $params = '?'.Arr::query($queryParameters);
        }

        return $this->client->get('v5/entities/'.config('actito.entity').'/profile-tables/'.config('actito.profile_table')."/profiles$params");
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-get-one
     * @param string $businessKey The business key of the profile or the key/value parameter
     */
    public function find(string $businessKey): Response
    {
        return $this->client->get('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table')."/profile/$businessKey");
    }

    public function firstOrCreate(string $email, array $data): Response
    {
        $response =  $this->find("emailAddress=$email");

        return $response->successful() ? $response : $this->updateOrCreate($data);
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4#operation/profiles-createorupdate
     */
    public function updateOrCreate(array $data): Response
    {
        $payload = [];

        if (! isset($data['attributes'])) {
            $data['attributes'] = $data;
        }

        foreach ($data['attributes'] as $key => $value) {
            $payload['attributes'][] = [
                'name' => $key,
                'value' => $value
            ];
        }

        return $this->client->post('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table').'/profile', $payload);
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4#operation/profiles-delete-one
     */
    public function delete(int $id): Response
    {
        return $this->client->delete('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table').'/profile/userId='.$id);
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-get-all
     * @param string $businessKey The business key of the profile or the key/value parameter
     */
    public function subscriptions(string $businessKey): Response
    {
        return $this->client->get('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table')."/profile/$businessKey/subscription");
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-add
     * @param string $businessKey The business key of the profile or the key/value parameter
     * @param string $subscriptionName The name of the subscription to subscribe
     */
    public function subscribe(string $businessKey, string $subscriptionName): Response
    {
        return $this->client->post('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table')."/profile/$businessKey/subscription/$subscriptionName");
    }

    /**
     * @link https://developers.actito.com/api-reference/data-v4/#operation/profiles-subscriptions-delete-one
     * @param string $businessKey The business key of the profile or the key/value parameter
     * @param string $subscriptionName The name of the subscription to unsubscribe
     */
    public function unsubscribe(string $businessKey, string $subscriptionName): Response
    {
        return $this->client->delete('v4/entity/'.config('actito.entity').'/table/'.config('actito.profile_table')."/profile/$businessKey/subscription/$subscriptionName");
    }
}
