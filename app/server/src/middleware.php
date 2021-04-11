<?php

require_once __DIR__ . '/middleware/CorsMiddleware.php';

// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
$app->add(new \App\Middleware\CorsMiddleware);
