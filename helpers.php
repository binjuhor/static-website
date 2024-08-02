<?php

use Binjuhor\Blade\BladeTemplate as Blade;

function asset($file, $show = true)
{
    $file_url = "src/assets/{$file}";
    if (!$show) {
        return $file_url;
    }
    echo $file_url;
    return '';
}

function getVar($key, $default = null)
{
    $env = file_get_contents('.env');
    $env = explode("\n", $env);
    foreach ($env as $line) {
        if (strpos($line, $key) !== false) {
            return explode('=', $line)[1];
        }
    }
    return $default;
}

function route($part = '')
{
    return getVar('APP_URL').'/'.$part;
}

function page( $page, $params = [] )
{
    $blade = new Blade([
        'view' => __DIR__ . '/src/views',
        'cache' => __DIR__ . '/cache',
        'compileDir' => __DIR__ . '/compiles',
        'url' => ''
    ]);

    echo $blade->render($page, $params);
}

function activate($page)
{
    $uri = substr($_SERVER['REQUEST_URI'], 1);

    if ($uri === $page) {
        return 'active';
    }

    return '';
}

function initContent($dispatcher)
{
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];

    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }
    $uri = rawurldecode($uri);

    $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            page('404');
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            page('405', $allowedMethods);
            break;
        case FastRoute\Dispatcher::FOUND:
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];
            page($handler, $vars);
            break;
    }
}