<?php

namespace App\Http\Controllers;


use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class BrandsController extends Controller
{
     public function allproducts()
    {
        $brands = Brands::all();
        if($brands==""){
        return response()->json([
            'success' => true,
            'message' => 'brands Not Found Done.',
            // 'data' => $brands

        ], 404);
        

        }else{
        return response()->json([
            'success' => true,
            'message' => 'brands Fetch Successfully Done.',
            'data' => $brands

        ], 200);
        
    }
}

public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'brand_name'=>'required',
            'brand_status'=>'required',
        ]);
   
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }  
     
         
        
           
            $brands = new brands();
            $brands->brand_name=$request->brand_name;
            $brands->brand_status=$request->brand_status;
        
   
            $brands->save();
            
             return response()->json([
            'success' => true,
            'message' => ' Brands Added Successfully.',
           
            //'image'=> $full_image
            
        ], 200);

         }





public function show_single_brand(Request $request , $id)
    {
         $brands = Brands::find($id);
        // $ids = $request->input('ids', []); // via injected instance of Request
      // $brands1 = Brands::whereIn('id', explode(',', $id))->get();
       // $brands1 = Brands::whereIn('id', explode(',', $id->$request->get()));
        if (is_null($brands)) {
            return response()->json([
                'success' => false,
                'message' => 'brands Details Not Found'
            ], 404);
        }
        return response()->json([
                'success' => false,
                'message' => 'brands Details Found',
                'brands' => $brands
            ], 404);

       // return $brands;
    }


    public function destroy($id)
    {
        $delete_brands = Brands::find($id);
        $delete_brands->delete();
   
        return response()->json([
            'success' => true,
            'message' => 'Brand Remove Successfully Done.'
        ], 200);
    }

}

