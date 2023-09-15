<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatgoryRequest;
use App\model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    public function index(){
        $category=Category::all();
        return view('Category',["cate"=>$category]);
    }

    public function show($category_id){
        $categories= Category::findOrFail($category_id);
        return view('categories.show',['categories'=>$categories]);
    }

    public function delete($category_id){
        $categories= Category::findOrFail($category_id);
        if(File::exists(public_path('categories/images/'.$categories->cate_image))){
            File::delete(public_path('categories/images/'.$categories->cate_image));
            }else{
            dd('File does not exists.');
            }
        $categories->delete();
        return redirect()->route('home');
    }

    public function create(){
        $cate=Category::all();
        return view('categories.create',['category'=>$cate]);
    }

    public function save(CatgoryRequest $request){

        $imageName='';
        if($request->hasFile('cate_image')){
            $image= $request->cate_image;
            $imageName=  time() .'_'. rand(0,1000) . "." . $image->extension(); //  3455235_22.png
            $image->move(public_path('categories/images'),$imageName);
        }

        Category::create([
            "cate_image" => $imageName,
            "id" => $request->id,
            "title_en" =>$request->title_en,
            "title_ar" =>$request->title_ar,
            "description_en"=> $request->description_en,
            "description_ar"=>$request->description_ar,
            "parent_id"=>$request->parent_id
        ]);

        return redirect()->route('home')->with('cate','NEW CATEGORY ADDED SUCCESSFULLY');
    }

    public function edit($category_id){
        $allCategory=Category::all();
        $cate=Category::findOrFail($category_id); 
        return view('categories.edit',['categories'=>$cate,'allCate'=>$allCategory]);
    }


    public function update(CatgoryRequest $request){
        $category_id= $request->old_id;
        $update=Category::findOrFail($category_id);
        $imageName='';
        if($request->hasFile('cate_image')){
            $image= $request->cate_image;
            $imageName=  time() .'_'. rand(0,1000) . "." . $image->extension(); //  3455235_22.png
            $image->move(public_path('categories/images'),$imageName);
        }

        $update->update([
            "cate_image" => $imageName,
            "id" => $request->id,
            "title_en" =>$request->title_en,
            "title_ar" =>$request->title_ar,
            "description_en"=> $request->description_en,
            "description_ar"=>$request->description_ar,
            "parent_id"=>$request->parent_id
        ]);

        return redirect()->route('home')->with('cate','UPDATED CATEGORY SUCCESSFULLY');
    }
}
