<?php

namespace App\Http\Controllers\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Dashboard\Post\StorePostRequest;
use App\Http\Resources\V1\Dashboard\Post\PostResource;
use App\Services\V1\Dashboard\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private PostService $postService) {}

    public function index(Request $request)
    {
        $posts = $this->postService->index($request);

        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $post = $this->postService->store($validated);

        return response()->json($post, 201);
    }
}
