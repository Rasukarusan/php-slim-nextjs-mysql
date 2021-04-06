<?php

declare(strict_types=1);

require_once __DIR__ . '/controllers/HomeController.php';

// Routes
$app->get('/[{name}]', HomeController::class . ':index');
