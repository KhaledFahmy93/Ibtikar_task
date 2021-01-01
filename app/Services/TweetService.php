<?php

namespace App\Services;

use App\Repositories\TweetRepository;

class TweetService {

    private $tweetRepository;

    public function __construct(TweetRepository $tweetRepository) 
    {
        $this->tweetRepository = $tweetRepository;
    }

    public function create($data) 
    {
        $data['user_id'] = auth()->user()->id;
        return $this->tweetRepository->create($data);
    }
}