<?php

namespace App\Repositories;

use App\Models\Tweet;
use App\Repositories\EloquentRepository;

class TweetRepository extends EloquentRepository
{
    /**
    * Description of TweetRepository
    */

    public function getModelName(): string
    {
        return Tweet::class;
    }
}