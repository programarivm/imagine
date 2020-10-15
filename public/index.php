<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $file = __DIR__ . '/../html/login.html';
    $response->getBody()->write(file_get_contents($file));
    return $response;
});

$app->get('/login/oauth2/callback', function (Request $request, Response $response, $args) {
    echo 'Soon available! Please be patient.';
    exit;
    // TODO ...
});

$app->run();
