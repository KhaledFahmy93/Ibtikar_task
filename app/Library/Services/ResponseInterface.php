<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Library\Services;

use Illuminate\Http\Response;

/**
 * Description of PrepareResponse
 *
 * @author Khaled
 */
interface ResponseInterface {

    /**
     * success response method.
     *
     * @param $result
     * @param $message
     * @param $code
     *
     * @return \Illuminate\Http\Response
     */
    public function success($result, $message, $code  = 200);

    /**
     * return error response.
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     *
     * @return \Illuminate\Http\Response
     */
    public function error($error, $errorMessages = [], $code = 404);

}
