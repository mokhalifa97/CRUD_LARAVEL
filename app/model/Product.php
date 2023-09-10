<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= [
        "title_en","title_ar","description_en","description_ar","price","quantity"
    ];
}
