<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    /**
    * Description of UserRepository
    */

    public function getModelName(): string
    {
        return User::class;
    }
}