<?php

namespace App\Http\Controllers\Api;

use App\Services\TweetService;
use App\Http\Requests\CreateTweetRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Helpers\HttpStatusCodes;

class TweetController extends Controller
{
    /**
     * create tweet instance .
     * @param  CreateTweetRequest $request
     * @param TweetService $tweetService
     * @return JsonResponse
     */
    public function store(CreateTweetRequest $request, TweetService $tweetService): JsonResponse 
    {
        try {
            $tweet = $tweetService->create($request->validated());
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($tweet, 'tweet created successfully');
    }

}
