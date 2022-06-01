<?php

namespace Shokme\Actito;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Shokme\Actito\Endpoints\Profiles;

class Actito
{
    public string $entity;

    public string $key;

    public string $version;

    public PendingRequest $client;

    public Profiles $profiles;

    public function __construct()
    {
        $this->entity = config('actito.entity');
        $this->key = config('actito.key');
        $this->version = config('actito.version');
        $this->client = Http::acceptJson()
            ->withToken($this->bearerToken())
            ->baseUrl(config('actito.domain'))
            ->timeout(config('actito.http.timeout'))
            ->retry(config('actito.http.retry'),config('actito.http.retry_sleep'));

        $this->profiles = new Profiles($this->client);
    }

    private function bearerToken(): string
    {
        return Http::withHeaders(['Authorization' => $this->key])->acceptJson()->get(config('actito.domain').'/auth/token')->json('accessToken');
    }
}
