<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        "id","title_en","title_ar","description_en","description_ar","parent_id",'cate_image'
    ];
}
