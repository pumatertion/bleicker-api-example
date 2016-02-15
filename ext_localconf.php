<?php

defined('TYPO3_MODE') or die ('Access denied.');

/**
 * @return void
 */
$boot = function () {

    /**
     * Register RequestHandler to TYPO3
     */
    \TYPO3\CMS\Core\Core\Bootstrap::getInstance()->registerRequestHandlerImplementation(
        \Bleicker\TYPO3\FastRoute\RequestHandler\RequestHandler::class
    );

    /**
     * Define pattern when the above registered RequestHandler should be invoked
     */
    \Bleicker\TYPO3\FastRoute\RequestHandler\RequestHandler::$uriPattern = '|^/api/.*|';

    /**
     * Define Route for a given request method, a route pattern, and controller/method which the route should invoke
     *
     * @info Only Controllers implementing \Bleicker\Http\Controller\ControllerInterface are allowed here
     * @info Only public controller-methods are allowed in a route
     */
    \Bleicker\FastRoute\RequestHandler\Routes\Routes::add(
        'GET',
        '/api/{what}/{should}/{i}/{do}',
        \Bleicker\ApiExample\Controller\ApiController::class,
        'fooAction'
    );
};

$boot();
unset($boot);
