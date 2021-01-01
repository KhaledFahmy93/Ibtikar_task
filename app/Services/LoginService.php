<?php

namespace App\Services;

use App\Exceptions\UserNotFoundException;
use App\Helpers\HttpStatusCodes;
use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function authenticateUser(array $userData)
    {

        if (! $token = auth()->attempt($userData)) {
            throw new UserNotFoundException('Unauthorised Access', HttpStatusCodes::HTTP_UNAUTHORIZED);
        }
        return $token;
    }
}
