<?php

namespace App\Services;

use App\Repositories\FollowRepository;
use App\Repositories\TweetRepository;

class FollowService {

    private $followRepository;
    private $tweetRepository;

    public function __construct(FollowRepository $followRepository , TweetRepository $tweetRepository) 
    {
        $this->followRepository = $followRepository;
        $this->tweetRepository = $tweetRepository;
    }

    public function create(array $data) 
    {
        $data['follower_id'] = auth()->user()->id; 
        return $this->followRepository->create($data);
    }

    public function getTimeLine($id)
    {
        $ids = $this->followRepository->findAllBy('follower_id', $id , ['follower_id']);
        
        $tweets = $this->tweetRepository->getAllWhereInOrder('user_id' , $ids , 'updated_at');

        return $tweets;
    }
}