<?php

namespace App\Services\V1\Dashboard\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductService
{
    public function index($request)
    {
        $query = Product::query()->orderBy('id', 'desc');

        if ($search = $request->search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        return $query->paginate(10);
    }

    public function store(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'description' => $data['description'],

            'slug' => $data['slug'] ?? null,
            'is_active' => $data['is_active'] ?? true,

            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords' => $data['meta_keywords'] ?? null,
        ]);
    }

    public function update(int $id, array $data)
    {
        $product = Product::findOrFail($id);

        $product->update($data);
        return $product;
    }

    public function show(int $id)
    {
        return Product::select(
            'id',
            'name',
            'price',
            'stock',
            'description',
            'slug',
            'is_active',
            'image',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'created_at',
            'updated_at'
        )->findOrFail($id);
    }
}
