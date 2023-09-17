<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{

    // show all product record 
    public function index(){
        $products= ProductResource::collection(Product::all());
        $data=[
            "msg"=>"ALL PRODUCT DATA RECORD!",
            "status"=>200,
            "data"=> $products
        ];
        return response()->json($data);
    }

    // show one product record 
    public function show($id){
        $product=Product::find($id);

        if($product){
            $data=[
                "msg"=>"RETURN ONE RECORD FORM PRODUCTS!",
                "status"=>200,
                "data"=> new ProductResource($product)
            ];
            return response()->json($data);
        }else{
            $data=[
                "msg"=>"NO SUCH ID EXIST!",
                "status"=>201,
                "data"=> NULL
            ];
            return response()->json($data);
        }
    }

    // create new product record
    public function create(Request $request){

        $validateData=  Validator::make($request->all(),[
            'id' => 'required|unique:posts|max:11',
            'title_en' => 'required| min:5|max:255',       
            'title_ar' => 'required| min:5|max:255',       
            'description_en' => 'required|min:10|max:255',       
            'description_ar' => 'required|min:10|max:255',       
            'price' => 'required|max:255',   
            'quantity' => 'required|max:255',
        ]);

        if($validateData->fails()){
            $data=[
                "msg"=> "NOT VALID DATA!!",
                "status"=> 203,
                "data" => $validateData->errors()
            ];
            return response()->json($data);
        }

        $new_product=Product::create([
            "id"=> $request->id,
            "title_en"=>$request->title_en,
            "title_ar"=>$request->title_ar,
            "description_en"=>$request->description_en,
            "description_ar"=>$request->description_ar,
            "price"=>$request->price,
            "quantity"=>$request->quantity
        ]);
        $data=[
            "msg"=> "CREATED NEW RECORD SUCCESSFULLY!!",
            "status"=> 201,
            "data" => new ProductResource($new_product)
        ];
        return response()->json($data);
    }


    // delete product record
    public function delete(Request $request){
        $id=$request->id;
        $pro_id=Product::find($id);
        $pro_id->delete();
        $data=[
            "msg"=> "deleted successfully !",
            "status"=> 205,
            "data" => null
        ];
        return response()->json($data);
    }

    // update product record
    public function update(Request $request){
        $validateData=  Validator::make($request->all(),[
            'id' => 'required|unique:posts|max:11',
            'title_en' => 'required| min:5|max:255',       
            'title_ar' => 'required| min:5|max:255',       
            'description_en' => 'required|min:10|max:255',       
            'description_ar' => 'required|min:10|max:255',       
            'price' => 'required|max:255',   
            'quantity' => 'required|max:255',
        ]);
        if($validateData->fails()){
            $data=[
                "msg"=> "NOT VALID DATA!!",
                "status"=> 203,
                "data" => $validateData->errors()
            ];
            return response()->json($data);
        }

        $pro_id=$request->old_id;
        $update=Product::findOrFail($pro_id);
        $update->update([
            "id"=> $request->id,
            "title_en"=>$request->title_en,
            "title_ar"=>$request->title_ar,
            "description_en"=>$request->description_en,
            "description_ar"=>$request->description_ar,
            "price"=>$request->price,
            "quantity"=>$request->quantity
        ]);

        $data=[
            "msg"=> "UPDATED successfully !",
            "status"=> 207,
            "data" => new ProductResource($update)
        ];
        return response()->json($data);
    }




}
