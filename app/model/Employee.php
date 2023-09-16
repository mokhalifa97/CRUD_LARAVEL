<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id','emp_name','department','dep_id','shift','salary'
    ];
}
