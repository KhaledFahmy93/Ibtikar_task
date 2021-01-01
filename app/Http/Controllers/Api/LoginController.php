<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\UserNotFoundException;
use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\LoginService;
use Illuminate\Http\JsonResponse;

    
class LoginController extends Controller {
    /**
     * Login API
     *
     * @param LoginUserRequest $request
     * @param LoginService $loginService
     * @return JsonResponse
     */
    public function __invoke(LoginUserRequest $request, LoginService $loginService): JsonResponse {

        try {
            $token = $loginService->authenticateUser($request->validated());
            return $this->response->success($token, 'login successfully', HttpStatusCodes::HTTP_OK);
        } catch (UserNotFoundException $userNotFoundException) {
            return $this->response->error($userNotFoundException->getMessage(), $userNotFoundException->getCode());
        }
    }

}
