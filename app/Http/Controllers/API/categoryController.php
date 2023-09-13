<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    public function index(){
        $categories= CategoryResource::collection(Category::all());
        $data=[
            "msg"=> "return all data from DB",
            "status"=> 200,
            "data" =>$categories
        ];
        return response()->json($data);
    }


    public function show($id){
        $category= Category::find($id);

        if($category){
        $data=[
            "msg"=> "return one record from DB",
            "status"=> 200,
            "data" => new CategoryResource($category)
        ];
        return response()->json($data);
    }else{
        $data=[
            "msg"=> "NO Such Id !",
            "status"=> 201,
            "data" => null
        ];
        return response()->json($data);
        }
    }

    //create new category api

    public function create(Request $request){

        $validateData=  Validator::make($request->all(),[
            'id' => 'required|unique:posts|max:11',
            'title_en' => 'required| min:5|max:255',       
            'title_ar' => 'required| min:5|max:255',       
            'description_en' => 'required|min:10|max:255',       
            'description_ar' => 'required|min:10|max:255',       
            'parent_id' => 'required|max:255',       
            'cate_image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048', 
        ]);

        if($validateData->fails()){
            $data=[
                "msg"=> "NOT VALID DATA!!",
                "status"=> 203,
                "data" => $validateData->errors()
            ];
            return response()->json($data);
        }
        
        $imageName='';
        if($request->hasFile('cate_image')){
            $image= $request->cate_image;
            $imageName=  time() .'_'. rand(0,1000) . "." . $image->extension(); //  3455235_22.png
            $image->move(public_path('categories/images'),$imageName);
        }

        $new_record= Category::create([
            "cate_image" => $imageName,
            "id" => $request->id,
            "title_en" =>$request->title_en,
            "title_ar" =>$request->title_ar,
            "description_en"=> $request->description_en,
            "description_ar"=>$request->description_ar,
            "parent_id"=>$request->parent_id
        ]);

        $data=[
            "msg"=> "CREATED NEW RECORD SUCCESSFULLY!!",
            "status"=> 201,
            "data" => new CategoryResource($new_record)
        ];
        return response()->json($data);

    }
}
