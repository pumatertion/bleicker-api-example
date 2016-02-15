<?php

namespace Bleicker\ApiExample\Controller;

use TYPO3\CMS\Core\Http\Response;

/**
 * Class ApiController
 *
 * @package Bleicker\ApiExample\Controller
 */
class ApiController extends AbstractController
{

    /**
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
