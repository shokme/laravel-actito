<?php

namespace Shokme\Actito;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Shokme\Actito\Endpoints\Action;
use Shokme\Actito\Endpoints\Email;
use Shokme\Actito\Endpoints\Form;
use Shokme\Actito\Endpoints\Import;
use Shokme\Actito\Endpoints\Profile;
use Shokme\Actito\Endpoints\Table;
use Shokme\Actito\Endpoints\Webhook;

class Actito
{
    public string $entity;

    public string $key;

    public string $version;

    public PendingRequest $client;

    public Profile $profile;

    public Table $table;

    public Email $email;

    public Webhook $webhook;

    public Action $action;

    public Form $form;

    public Import $import;

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

        $this->profile = new Profile($this->client);
        $this->table = new Table($this->client);
        $this->email = new Email($this->client);
        $this->webhook = new Webhook($this->client);
        $this->action = new Action($this->client);
        $this->form = new Form($this->client);
        $this->import = new Import($this->client);
    }

    private function bearerToken(): string
    {
        return Http::withHeaders(['Authorization' => $this->key])->acceptJson()->get(config('actito.domain').'/auth/token')->json('accessToken');
    }
}
