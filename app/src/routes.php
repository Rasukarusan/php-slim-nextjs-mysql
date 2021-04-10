<?php

use Controllers\HomeController;

// Routes
$app->get('/[{name}]', HomeController::class . ':index');
