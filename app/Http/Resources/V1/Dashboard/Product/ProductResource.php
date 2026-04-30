<?php

namespace App\Http\Resources\V1\Dashboard\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'price'       => $this->price,
            'stock'       => $this->stock,
            'description' => $this->description,

            'slug'        => $this->slug,
            'is_active'   => $this->is_active,

            'image'       => $this->image,
            'image_url'   => $this->image ? asset('storage/' . $this->image) : null,

            'meta_title'       => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords'    => $this->meta_keywords,

            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
