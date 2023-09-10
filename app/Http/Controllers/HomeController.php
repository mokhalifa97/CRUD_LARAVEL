<?php

namespace App\Http\Controllers;

use App\model\Category;
use App\model\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        $products=Product::all();
        return view('home',['cate'=>$categories,'pro'=>$products]);
    }
}
