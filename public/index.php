<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use SONFin\Application;
use SONFin\Plugins\DbPlugin;
use SONFin\Plugins\RoutePlugin;
use SONFin\Plugins\ViewPlugin;
use SONFin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';


$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());


$app
    ->get('/home/{name}/{id}', function (ServerRequestInterface $request) {
        $response = new \Zend\Diactoros\Response();
        $response->getBody()->write("response com emitter do diactoros");
        return $response;
    });

$app
    ->get('/category-costs', function () use ($app) {
        $view = $app->service('view.renderer');
        $meuModel = new \SONFin\Models\CategoryCost();
        $categories = $meuModel->all();
        return $view->render('category-costs/list.html.twig', [
            'categories' => $categories
        ]);
    })
    ->get('/category-costs/new', function () use ($app) {
        $view = $app->service('view.renderer');
        return $view->render('category-costs/create.html.twig');
    })
    ->post('/category-costs/store', function(ServerRequestInterface $request) {
        $data = $request->getParsedBody();
        \SONFin\Models\CategoryCost::create($data);
        return new \Zend\Diactoros\Response\RedirectResponse('/category-costs');
    });

$app->start();

