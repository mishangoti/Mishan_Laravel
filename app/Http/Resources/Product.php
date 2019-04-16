<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //         'id' => $this->id,
        //         'name' => $this->name,
        //         'category_id' => $this->category_id,
        //         'user_id' => $this->user_id,
        //         'description' => $this->description,
        //         'price' => $this->price,
        //         'stock' => $this->stock,
        //         'feth_image' => $this->feth_image,
        // ];
    }
}
