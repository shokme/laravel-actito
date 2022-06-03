<?php

namespace Shokme\Actito\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Form
{
    public function __construct(private PendingRequest $client)
    {
    }

    /**
     * @link https://developers.actito.com/api-reference/forms-v4#operation/forms-participations-get-one
     */
    public function participation(string $form, int $id): Response
    {
        return $this->client->get('v4/entity/'.config('actito.entity').'/form/'.$form.'/participation/'.$id);
    }
}
