<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\RegisterService;
use Illuminate\Http\JsonResponse;
use App\Helpers\HttpStatusCodes;


class RegisterController extends Controller {

    /**
     * Create a new user instance after a valid registration.
     *
     * @param RegisterUserRequest $request
     * @param RegisterService $registerService
     * @return JsonResponse
     */
    public function __invoke(RegisterUserRequest $request, RegisterService $registerService): JsonResponse {
        
        try {

            $user = $registerService->saveRegistrationDetails($request->validated());
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($user,'Registration Success');
    }

}
