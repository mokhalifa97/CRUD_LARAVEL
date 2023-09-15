<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "title_en"=>$this->title_en,
            "title_ar"=>$this->title_ar,
            "description_en"=>$this->description_en,
            "description_ar"=>$this->description_ar,
            "price"=>$this->price,
            "quantity"=>$this->quantity
        ];
    }
}
