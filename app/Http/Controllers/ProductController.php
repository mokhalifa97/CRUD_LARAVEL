<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

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

    public function create(){
        return view('products.create');
    }

    public function save(ProductRequest $request){
        Product::create([
            "id" =>$request->id,
            "title_en" =>$request->title_en,
            "title_ar"=>$request->title_ar,
            "description_en"=>$request->description_en,
            "description_ar"=>$request->description_ar,
            "price"=>$request->price,
            "quantity"=>$request->quantity
        ]);

        return redirect()->route('home')->with('success','NEW PRODUCT ADDED SUCCESSFULLY');
    }

    public function edit($id){
        $product=Product::findOrFail($id);
        return view('products.edit',['products'=>$product]);
    }

    public function update(ProductRequest $request){
        $product_id= $request->old_id;
        $update=Product::findOrFail($product_id);

        $update->update([
            "id" => $request->id,
            "title_en" =>$request->title_en,
            "title_ar" =>$request->title_ar,
            "description_en"=> $request->description_en,
            "description_ar"=>$request->description_ar,
            "price"=>$request->price,
            'quantity'=>$request->quantity
        ]);

        return redirect()->route('home')->with('pro','UPDATED PRODUCT SUCCESSFULLY');
    }
    
}
