<?php

namespace App\Http\Controllers\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Dashboard\Product\StoreProductRequest;
use App\Http\Requests\V1\Dashboard\Product\UpdateProductRequest;
use App\Http\Resources\V1\Dashboard\Product\ProductCollection;
use App\Http\Resources\V1\Dashboard\Product\ProductResource;
use App\Services\V1\Dashboard\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService) {}

    public function index(Request $request)
    {
        $products = $this->productService->index($request);
        return new ProductCollection($products);
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product = $this->productService->store($validated);

        return response()->json($product, 201);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productService->update((int) $id, $request->validated());
        return new ProductResource($product);
    }

    public function show($id)
    {
        $product = $this->productService->show((int) $id);
        return new ProductResource($product);
    }
}
