<?php

use Controllers\HomeController;

// Routes
$app->get('/', HomeController::class . ':get');
$app->get('/index', HomeController::class . ':index');
$app->post('/', HomeController::class . ':store');
$app->map(['PUT', 'PATCH'], '/{id}', HomeController::class . ':update');
$app->delete('/{id}', HomeController::class . ':destroy');
