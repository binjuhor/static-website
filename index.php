<?php
require_once "vendor/autoload.php";

initContent(FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'home');
    $r->addRoute('GET', '/users', 'users');
    $r->addRoute('GET', '/user/{id:\d+}', 'test');
    $r->addRoute('GET', '/widget/{id:\d+}[/{name}]', 'sport');
}));