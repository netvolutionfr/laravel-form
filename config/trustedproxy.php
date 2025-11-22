<?php

use Illuminate\Http\Request;

$configuredProxies = env('TRUSTED_PROXIES');

return [
    'proxies' => match (true) {
        $configuredProxies === null => null,
        $configuredProxies === '*' => '*',
        default => array_filter(
            array_map(
                trim(...),
                explode(',', $configuredProxies)
            ),
        ),
    },

    'headers' => env('TRUSTED_PROXY_HEADERS', Request::HEADER_X_FORWARDED_AWS_ELB),
];
