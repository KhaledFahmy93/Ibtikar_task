<?php 

namespace App\Repositories;

use App\Models\Follow;
use App\Repositories\EloquentRepository;

class FollowRepository extends EloquentRepository
{
    /**
    * Description of FollowRepository
    */

    public function getModelName(): string
    {
        return Follow::class;
    }
}