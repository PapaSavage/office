<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'external_code' => $this->external_code,
            'name' => $this->name,
            'description' => $this->description,
            'price' => intval($this->price),
            'images' => GoodImageResource::collection($this->whenLoaded('images')),
            'extensions' => GoodExtensionResource::collection($this->whenLoaded('extensions')),
        ];
    }
}
