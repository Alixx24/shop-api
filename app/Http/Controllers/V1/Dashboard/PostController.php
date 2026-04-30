<?php

namespace App\Http\Controllers\V1\Dashboard;

use App\Http\Controllers\Controller;
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
}
