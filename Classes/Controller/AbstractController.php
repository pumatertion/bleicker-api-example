<?php

namespace Bleicker\ApiExample\Controller;

use Bleicker\FastRoute\RequestHandler\Controller\ControllerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AbstractController
 *
 * @package Bleicker\ApiExample\Controller
 */
abstract class AbstractController implements ControllerInterface
{

    /**
     * @param RequestInterface  $request
     * @param                   $methodName
     * @param array             $methodArguments
     *
     * @return ResponseInterface
     */
    public function processRequest($methodName, $methodArguments, RequestInterface $request)
    {
        return call_user_func_array(array($this, $methodName), $methodArguments);
    }
}
