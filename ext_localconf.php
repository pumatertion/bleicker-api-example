<?php

defined('TYPO3_MODE') or die ('Access denied.');

/**
 * @param string $vendorName
 * @param string $packageKey
 * @param array  $configuration
 */
$boot = function ($vendorName, $packageKey, array $configuration) {

    /**
     * Register RequestHandler to TYPO3
     */
    \TYPO3\CMS\Core\Core\Bootstrap::getInstance()->registerRequestHandlerImplementation(
        \Bleicker\RequestHandler\RequestHandler::class
    );

    /**
     * Define pattern when the above registered RequestHandler should be invoked
     */
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['bleicker']['typo3-request-handler']['uriPattern'] = '|^/api/.*|';

    /**
     * Define Route for a given request method, a route pattern, and controller/method which the route should invoke
     * @info Only Controllers implementing \Bleicker\Http\Controller\ControllerInterface are allowed here
     * @info Only public controller-methods are allowed in a route
     */
    \Bleicker\Http\Routes\Routes::add(
        'GET',
        '/api/{what}/{should}/{i}/{do}',
        \Bleicker\ApiExample\Controller\ApiController::class,
        'fooAction'
    );
};

$boot('Bleicker', 'bleicker_api', (array)unserialize($_EXTCONF));
unset($boot);
