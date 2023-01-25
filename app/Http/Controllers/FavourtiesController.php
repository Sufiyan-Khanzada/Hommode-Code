<?php

namespace App\Http\Controllers;
use App\Models\Favourties;
use Validator;

use Illuminate\Http\Request;

class FavourtiesController extends Controller
{
    //

 public function all()
    {
        $fav = Favourties::all();
         return $fav; 
    }

    public function create_fav(Request $request)
    {
         $input = $request->all();
   
        $validator = Validator::make($input, [
            'user_id'=>'required',
            'product_id'=>'nullable|unique',
  ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }  




            $fav = new Blogs();
            $fav->product_id=$request->product_id;
            $fav->user_id=$request->user_id;
            
            
            $fav->save();

             return response()->json([
            'success' => true,
            'message' => 'Favourties Details Added Successfully.',
           // 'data'=> $input,
           // 'image'=> $full_image
            
        ], 200);
         }


  public function destroy_fav($id)
    {
        $delete_fav = fav::find($id);
        $delete_fav->delete();
   
        return response()->json([
            'success' => true,
            'message' => 'Favourties Remove Successfully Done.'
        ], 200);
    }


}
