<?php

return [
    'domain' => env('ACTITO_DOMAIN'),
    'key' => env('ACTITO_KEY'),
    'entity' => env('ACTITO_ENTITY'),
    'profile_table' => env('ACTITO_PROFILE_TABLE', 'Users'),
    'user_agent' => env('ACTITO_USER_AGENT'),
    'http' => [
        'timeout' => env('ACTITO_HTTP_TIMEOUT', 10),
        'retry' => env('ACTITO_HTTP_RETRY', 3),
        'retry_sleep' => env('ACTITO_HTTP_SLEEP', 100),
    ],
];
