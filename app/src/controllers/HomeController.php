<?php

namespace Controllers;

use Models\Log;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class HomeController.
 */
class HomeController
{
    private $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function index(Request $request, Response $response, $args)
    {
        // Sample log message
        $this->app->logger->info("php-slim-practice '/' route");

        $logs = Log::all();
        $args['logs'] = $logs;

        // Render index view
        return $this->app->renderer->render($response, '/Home/index.phtml', $args);
    }
}
