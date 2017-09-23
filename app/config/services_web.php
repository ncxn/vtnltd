<?php

use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Vtnltd\Plugin\MetroFlash as Flash;
/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router();

    $router->setDefaultModule('home');
 
    return $router;
});

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
 $di->setShared('metroFlash', function() {
    $metroFlash = new Flash();
 
    return $metroFlash;
});
/**
* Set the default namespace for dispatcher
*/
$di->setShared(
    'dispatcher',
    function() use ($di) {
        $eventsManager = $di->getShared('eventsManager');

        $security = new \Vtnltd\Plugin\Security($di);
        $eventsManager->attach('dispatch', $security);

        $dispatcher = new Dispatcher();
        $dispatcher->setEventsManager($eventsManager);
        $dispatcher->setDefaultNamespace('Vtnltd\Modules\Home\Controllers');
        return $dispatcher;
    }
);


