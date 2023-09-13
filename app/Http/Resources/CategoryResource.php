<?php

namespace App\Http\Resources;

use App\model\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            "title in english"=>$this->title_en,
            "title in arabic"=>$this->title_ar,
            "description in english"=>$this->description_en,
            "description in arabic"=>$this->description_ar,
            "parent_id"=>$this->parent_id,
            "image"=>$this->cate_image,
        ];
    }



}
