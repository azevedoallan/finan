<?php


use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/charts', function (ServerRequestInterface $request) use ($app) {
        $view = $app->service('view.renderer');
        $repository = $app->service('category.repository');
        $auth = $app->service('auth');
        $data = $request->getQueryParams();
        $dateStart = $data['date_start'] ?? (new \DateTime())->modify('-1 month');
        $searchDefault2 = $dateStart instanceof \DateTime ? $dateStart->format('d/m/Y') : $dateStart;
        $dateStart = $dateStart instanceof \DateTime ? $dateStart->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y', $dateStart)->format('Y-m-d');

        $dateEnd = $data['date_end'] ?? new \DateTime();
        $dateEnd = $dateEnd instanceof \DateTime ? $dateEnd->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y', $dateEnd)->format('Y-m-d');

        $categories = $repository->sumByPeriod($dateStart, $dateEnd, $auth->user()->getId());
        $categories['dateStartDefault2'] = $searchDefault2;
        return $view->render('charts.html.twig', [
            'categories' => $categories
        ]);
    }, 'charts.list');
