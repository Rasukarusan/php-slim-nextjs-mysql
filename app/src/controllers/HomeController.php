<?php

namespace Controllers;

use Services\HomeService;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class HomeController.
 */
class HomeController
{
    private $app;

    private $service;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->service = new HomeService();
    }

    public function index(Request $request, Response $response, $args)
    {
        $this->app->logger->info("php-slim-practice '/' route");
        $args['logs'] = $this->service->findAll();
        return $this->app->renderer->render($response, '/Home/index.phtml', $args);
    }

    public function store(Request $request, Response $response, $args)
    {
        return $this->service->store()->json();
    }

    public function update(Request $request, Response $response, $args)
    {
        $value = $request->getParam('value');

        if (!array_key_exists('id', $args) || !is_numeric($args['id'])) {
            return 'Invalid id';
        }

        if ($value === null) {
            return 'Invalid value';
        }

        return $this->service->update($args['id'], $value)->json();
    }

    public function destroy(Request $request, Response $response, $args)
    {
        if (!array_key_exists('id', $args) || !is_numeric($args['id'])) {
            return 'Invalid id';
        }
        return $this->service->destroy($args['id'])->json();
    }
}
