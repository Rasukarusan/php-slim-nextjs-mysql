<?php

namespace App\Middleware;

class CorsMiddleware
{
    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next)
    {
        /** @var $response \Slim\Http\Response */
        $response = $next($request, $response);

        return $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
