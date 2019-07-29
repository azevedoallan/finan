<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use SONFin\Application;
use SONFin\Plugins\RoutePlugin;
use SONFin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';


$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function (RequestInterface $request){
    var_dump($request->getUri()); die();
    echo "Hello World!!";
});


$app->get('/home/{name}/{id}', function (ServerRequestInterface $request) {
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("response com emitter do diactoros");
    return $response;
});

$app->start();

