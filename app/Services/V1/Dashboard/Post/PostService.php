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

    public function store(array $data)
    {
        return Post::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'slug' => $data['slug'],
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords' => $data['meta_keywords'] ?? null,
            'status' => $data['is_active'] ?? 0,
        ]);
    }
}
