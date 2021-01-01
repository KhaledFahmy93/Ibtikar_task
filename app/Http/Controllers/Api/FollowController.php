<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\FollowUserRequest;
use Illuminate\Http\Request;
use App\Services\FollowService;
use Illuminate\Http\JsonResponse;
use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{

    public function follow(FollowUserRequest $request , FollowService $followService): JsonResponse 
    {
        try {
            $follow = $followService->create($request->validated());
        } catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($follow, 'follow added successfully');
    }

    public function timeLine(Request $request , FollowService $followService): JsonResponse
    {
        try{
            $follower_id =auth()->user()->id;
            $timeline = $followService->getTimeLine($follower_id);

        }catch (\Exception $exception) {
            return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        return $this->response->success($timeline, 'list timeline successfully');
    }
}
