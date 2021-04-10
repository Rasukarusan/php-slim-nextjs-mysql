<?php

use Controllers\HomeController;

// Routes
$app->get('/{name}', HomeController::class . ':index');
$app->post('/', HomeController::class . ':store');
$app->map(['PUT', 'PATCH'], '/{id}', HomeController::class . ':update');
$app->delete('/{id}', HomeController::class . ':destroy');
