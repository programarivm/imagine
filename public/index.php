<?php

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

define('APP_PATH', dirname(__FILE__) . "/../");

require APP_PATH . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(APP_PATH);
$dotenv->load();

$app = AppFactory::create();

$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $file = APP_PATH . 'html/login.html';
    $response->getBody()->write(file_get_contents($file));
    return $response;
});

$app->get('/home', function (Request $request, Response $response, $args) {
    $file = APP_PATH . 'html/home.html';
    $response->getBody()->write(file_get_contents($file));
    return $response;
});

$app->get('/login/oauth2/callback', function (Request $request, Response $response, $args) {
    $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
    $body = http_build_query([
        'code' => $_GET['code'],
        'grant_type' => 'authorization_code',
        'redirect_uri' => $_ENV['TRYROLL_OAUTH_REDIRECT_URL'],
        'client_id' => $_ENV['TRYROLL_OAUTH_CLIENT_ID'],
    ]);
    $response = (new GuzzleClient())->send(
        new GuzzleRequest('POST', $_ENV['TRYROLL_OAUTH_ISSUER_URL'].'/token', $headers, $body)
    );
    switch ($response->getStatusCode()) {
        case '200':
            $token = json_decode((string) $response->getBody(), true);
            setcookie(
                'access_token',
                $token['access_token'],
                time() + $token['expires_in'],
                '/',  // domain
                '',   // subdomains
                true, // secure, https
                true  // HttpOnly
            );
            return $response->withStatus(200)->withHeader('Location', '/home');
        default:
            // TODO
            break;
    }
});

$app->run();
