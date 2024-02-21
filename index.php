<?php
$f3 = require('f3-core/base.php');
$f3->set('AUTOLOAD','classes/');

$f3->route('GET /',
    function ($f3) {
        $f3->set('content', 'views/index.htm');
        echo Template::instance()->render('views/app.htm');
    }
);

$routes = [
    ['method' => 'GET', 'page' => 'case-converter'],
    ['method' => 'GET', 'page' => 'swap-json-key-value'],
    ['method' => 'GET', 'page' => 'map-json-objects'],
];

function autoRoute()
{
    global $routes, $f3;
    foreach ($routes as $route) {
        $f3->route($route['method'] . ' /' . $route['page'],
            function ($f3) use ($route) {
                $f3->set('content', 'views/' . $route['page'] . '.htm');
                echo Template::instance()->render('views/app.htm');
            }
        );
    }
}

$f3->route('GET|POST /php-unserializer', 'PhpUnserializer->index');
// $f3->route('GET /case-converter', 'CaseConverter->index');
// $f3->route('GET /swap-json-key-value', 'SwapJsonKeyValue->index');
// $f3->route('GET /map-json-objects', 'MapJsonObjects->index');

autoRoute();
$f3->run();