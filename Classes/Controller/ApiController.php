<?php

namespace Bleicker\ApiExample\Controller;

use Bleicker\Application\ContextInterface;
use Bleicker\Http\Controller\ControllerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Http\Response;

/**
 * Class ApiController
 *
 * @package Bleicker\ApiExample\Controller
 */
class ApiController implements ControllerInterface
{

    /**
     * @return ContextInterface
     */
    public static function getContext()
    {
        // TODO: Implement getContext() method.
    }

    /**
     * @param ContextInterface $contextInterface
     *
     * @return void
     */
    public static function setContext(ContextInterface $contextInterface)
    {
        // TODO: Implement setContext() method.
    }

    /**
     * @param RequestInterface $request
     * @param                   $methodName
     * @param array $methodArguments
     *
     * @return ResponseInterface
     */
    public function processRequest($methodName, $methodArguments, RequestInterface $request)
    {
        return call_user_func_array(array($this, $methodName), $methodArguments);
    }

    /**
     *
     * @param string $what
     * @param string $should
     * @param string $i
     * @param string $do
     *
     * @return Response
     * @info This Action will be called for defined route: GET /api/{what}/{should}/{i}/{do}
     * @info Example URI: GET http://localhost:8000/api/doo/whatever/you/want
     */
    public function fooAction($what, $should, $i, $do)
    {
        $response = new Response();
        $response->getBody()->write(
            addslashes($what) . ' ' . addslashes($should) . ' ' . addslashes($i) . ' ' . addslashes($do) . '!'
        );
        return $response->withStatus(200, 'Thank you');
    }
}
