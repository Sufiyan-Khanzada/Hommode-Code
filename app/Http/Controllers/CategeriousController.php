<?php

namespace App\Http\Controllers;

use App\Models\Categerious;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Validator;

class CategeriousController extends Controller
{
    //

     public function allcat()
    {
        $cat = Categerious::all();
        if($cat==""){
        return response()->json([
            'success' => true,
            'message' => 'Category Not Found Done.',
            // 'data' => $Items

        ], 404);
        

        }else{
        return response()->json([
            'success' => true,
            'message' => 'Category Fetch Successfully Done.',
            'data' => $cat

        ], 200);
        
    }
}

public function store(Request $request)
    {
    //      if(!$request->hasFile('fileName')) {
    //     return response()->json(['upload_file_not_found'], 400);
    // }
 
    // $allowedfileExtension=['pdf','jpg','png'];
    // $files = $request->file('fileName'); 
    // $errors = [];
 
    // foreach ($files as $file) {      
 
    //     $extension = $file->getClientOriginalExtension();
 
    //     $check = in_array($extension,$allowedfileExtension);
 
    //     if($check) {
    //         foreach($request->fileName as $mediaFiles) {
 
    //             $path = $mediaFiles->store('public/images');
    //             $name = $mediaFiles->getClientOriginalName();
      
    //             //store image file into directory and db
    //             $save = new Image();
    //             $save->title = $name;
    //             $save->path = $path;
    //             $save->save();
    //         }
    //     } else {
    //         return response()->json(['invalid_file_format'], 422);
    //     }
 
    // }
        
        
        $input = $request->all();
   
        $validator = Validator::make($input, [
          
            'main_category'=>'required|string',
            'sub_category' => 'required|string',
            'sub_category1' => 'required|string',
            'main_cat_pic'=>'nullable',
            
            
           ]);
   
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }  
     
        // $items_add = items::create($input);
        ////////////Image code start ////////////////
        //$image_upload="";
        $images=$request->file('main_cat_pic');
        
        
         // $imageName="";
         // $imageName1="";
         // $imageName2="";
         // $imageName3="";
         // $imageName4="";
         // $imageName5="";
         // $imageName6="";
         // $imageName7="";
         // $imageName8="";
         // $imageName9="";
         
         $imagepath="https://Homemod.code7labs.com/storage/app/public/uploads/items";
         ////All fill One time////
         
// if($images!='' && $images1!='' && $images2!='' && $images3!='' && $images4!='' && $images5!='' 
//          && $images6!='' && $images7!='' && $images8!='' && $images9!=''){

if($images!=''){
           

            $newname=rand().'.'.$images->getClientOriginalExtension();
            $images->move('storage/app/public/uploads/items',$newname);
            $imageName=$imageName.$newname;
            $full_image=$imagepath."/".$imageName;

          
            $cat = new Categerious();
            $cat->main_category=$request->main_category;
            $cat->sub_category=$request->sub_category;
            $cat->sub_category1=$request->sub_category1;
            
            
            //Image Code///
            $cat->main_cat_pic=$full_image;    
            ///Image Code end///    
           
            $cat->save();
            
             return response()->json([
            'success' => true,
            'message' => ' Details Added Successfully.',
            'Images'=> 'Category Image Added',
            //'image'=> $full_image
            
        ], 200);


         }
         else {
            

            $cat = new Categerious();
            $cat->main_category=$request->main_category;
            $cat->sub_category=$request->sub_category;
            $cat->sub_category1=$request->sub_category1;

            
           
             $cat->save();
          
             
             
         }

     

        return response()->json([
            'success' => true,
            'message' => 'Category Details Added Successfully.',
            'Images'=> 'Image Not Added',
            //'image'=> $full_image
            
        ], 200);

         }



 public function show_single_category(Request $request , $id)
    {
         $cat = Categerious::find($id);
        // $ids = $request->input('ids', []); // via injected instance of Request
      // $items1 = items::whereIn('id', explode(',', $id))->get();
       // $items1 = items::whereIn('id', explode(',', $id->$request->get()));
        if (is_null($cat)) {
            return response()->json([
                'success' => false,
                'message' => 'Category Details Not Found'
            ], 404);
        }
        return response()->json([
                'success' => false,
                'message' => 'Items Details Found',
                'Category' => $cat
            ], 404);

       // return $items;
    }




      public function update_cat(Request $request , $id)
    {

         $input = $request->all();
         $images=$request->file('main_cat_pic');
         $imageName="";
         $imagepath="https://Homemod.code7labs.com/storage/app/public/uploads/pages";
         
         if($images!=''){
            $newname=rand().'.'.$images->getClientOriginalExtension();
            $images->move('storage/app/public/uploads/pages',$newname);
            $imageName=$imageName.$newname.",";

            $full_image=$imagepath."/".$imageName;

            $cat = new Categerious();
            $cat = Categerious::find($id);
            
            if($pages){
            
            $cat->main_category=$request->main_category;
            $cat->sub_category=$request->sub_category;
            $cat->sub_category1=$request->sub_category1;
            
            
            //Image Code///
            $cat->main_cat_pic=$input['main_cat_pic']=$full_image;    
            ///Image Code end///    
           
            $cat->save();
            
            
            
            return response()->json([
            'success' => true,
            'message' => 'Category Details Updated Successfully.'
        ], 200);

                
            }
            
         }  
            
            $cat = new Categerious();
            $cat = Categerious::find($id);
            
           
         if($cat){
           
             $cat->main_category=$request->main_category;
            $cat->sub_category=$request->sub_category;
            $cat->sub_category1=$request->sub_category1;
            
            
            //Image Code///
            $cat->main_cat_pic=$input['main_cat_pic']=$full_image;    
            ///Image Code end///    
           
            $cat->save();
            
             return response()->json([
            'success' => true,
            'message' => 'Category Details Updated Successfully.'
        ], 200);

            
         } 
         else{
             return response()->json([
            'success' => true,
            'message' => 'Category Not Found.'
        ], 404);
 
             
         }
       
         
   
    }













 public function destroy_cat($id)
    {
        $delete_cat = Categerious::find($id);
        $delete_cat->delete();
   
        return response()->json([
            'success' => true,
            'message' => 'Category Remove Successfully Done.'
        ], 200);
    }





}
