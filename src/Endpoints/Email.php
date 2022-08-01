<?php

namespace Shokme\Actito\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Email
{
    public function __construct(private PendingRequest $client)
    {
    }

    /**
     * @link https://developers.actito.com/api-reference/campaigns-v4#operation/emailcampaigns-transactional-trigger
     */
    public function transactional(string $mail, array $data = []): Response
    {
        return $this->client->post('v4/entity/'.config('actito.entity').'/transactionalmail/'.$mail.'/contact', $data);
    }

    /**
     * @link https://developers.actito.com/api-reference/campaigns-v4#operation/customtables-webhook-create
     * @param  int|string  $profile can be either an id or email
     */
    public function profile(string $mail, int|string $profile, array $data): Response
    {
        if (! is_numeric($profile)) {
            $profile = "emailAddress=$profile";
        }

        return $this->client->post('v4/entity/'.config('actito.entity').'/mail/'.$mail.'/profile/'.$profile, $data);
    }
}
