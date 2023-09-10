<?php

namespace App\Http\Controllers;

use App\model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        return view("product");
    }

    public function show($product_id){
        $pro=Product::findOrFail($product_id);
        return view('products.show',['product'=>$pro]);
    }

    public function delete($product_id){
        $pro= Product::findOrFail($product_id);
        $pro->delete();
        return redirect()->route('home');
    }
}
