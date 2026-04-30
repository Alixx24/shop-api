<?php

namespace App\Services\V1\Dashboard\Post;

use App\Models\Post;

class PostService
{
    public function index($request)
    {
        $query = Post::query()->orderBy('id', 'desc');
        if ($search = $request->search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        return $query->paginate(10);
    }
}
