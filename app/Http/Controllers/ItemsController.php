<?php

namespace App\Http\Controllers;


use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Validator;

class ItemsController extends Controller
{
    public function allproducts()
    {
        $items = Items::all();
        if($items==""){
        return response()->json([
            'success' => true,
            'message' => 'Items Not Found Done.',
            // 'data' => $Items

        ], 404);
        

        }else{
        return response()->json([
            'success' => true,
            'message' => 'Items Fetch Successfully Done.',
            'data' => $items

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
            'title'=>'required',
            'short_description'=>'required',
            'long_description'=>'required|string',
            'normal_price'=>'required|string',
            'sale_price'=>'required',
            'category'=>'required|string',
            'sub_category' => 'required|string',
            'sku_code' => 'required|string',
            'color'=>'required|string',
            'size' => 'required|string',
            'how_to_use' => 'required|string',
            'reviews' => 'required|string',
            'stock_available' => 'required|string',


            
            'image'=>'nullable',
            'image1'=>'nullable',
            'image2'=>'nullable',
            'image3'=>'nullable',
            'image4'=>'nullable',
            'image5'=>'nullable',
            'image6'=>'nullable',
            'image7'=>'nullable',
            'image8'=>'nullable',
            'image9'=>'nullable',
            
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
        $images=$request->file('image');
        $images1=$request->file('image1');
        $images2=$request->file('image2');
        $images3=$request->file('image3');
        $images4=$request->file('image4');
        $images5=$request->file('image5');
        $images6=$request->file('image6');
        $images7=$request->file('image7');
        $images8=$request->file('image8');
        $images9=$request->file('image9');
        
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
         
         $imagepath="https://amexitems.code7labs.com/storage/app/public/uploads/items";
         ////All fill One time////
         
// if($images!='' && $images1!='' && $images2!='' && $images3!='' && $images4!='' && $images5!='' 
//          && $images6!='' && $images7!='' && $images8!='' && $images9!=''){

if($images!='' && $images1!='' && $images2!='' && $images3!='' && $images4!='' && $images5!='' 
        && $images6!='' && $images7!='' && $images8!='' && $images9!=''){
           

            // $newname=rand().'.'.$images->getClientOriginalExtension();
            // $images->move('storage/app/public/uploads/items',$newname);
            // $imageName=$imageName.$newname;
            // $full_image=$imagepath."/".$imageName;

            // $newname1=rand().'.'.$images1->getClientOriginalExtension();
            // $images1->move('storage/app/public/uploads/items',$newname1);
            // $imageName1=$imageName1.$newname1;
            // $full_image1=$imagepath."/".$imageName1;

            // $newname2=rand().'.'.$images2->getClientOriginalExtension();
            // $images2->move('storage/app/public/uploads/items',$newname2);
            // $imageName2=$imageName2.$newname2;
            // $full_image2=$imagepath."/".$imageName2;

            // $newname3=rand().'.'.$images3->getClientOriginalExtension();
            // $images3->move('storage/app/public/uploads/items',$newname3);
            // $imageName3=$imageName3.$newname3;
            // $full_image3=$imagepath."/".$imageName3;

            // $newname4=rand().'.'.$images4->getClientOriginalExtension();
            // $images4->move('storage/app/public/uploads/items',$newname4);
            // $imageName4=$imageName4.$newname4;
            // $full_image4=$imagepath."/".$imageName4;

            // $newname5=rand().'.'.$images5->getClientOriginalExtension();
            // $images5->move('storage/app/public/uploads/items',$newname5);
            // $imageName5=$imageName5.$newname5;
            // $full_image5=$imagepath."/".$imageName5;
            

            // $newname6=rand().'.'.$images6->getClientOriginalExtension();
            // $images6->move('storage/app/public/uploads/items',$newname6);
            // $imageName6=$imageName6.$newname6;
            // $full_image6=$imagepath."/".$imageName6;
            
            // $newname7=rand().'.'.$images7->getClientOriginalExtension();
            // $images7->move('storage/app/public/uploads/items',$newname7);
            // $imageName7=$imageName7.$newname7;
            // $full_image7=$imagepath."/".$imageName7;

            // $newname8=rand().'.'.$images8->getClientOriginalExtension();
            // $images8->move('storage/app/public/uploads/items',$newname8);
            // $imageName8=$imageName8.$newname8;
            // $full_image8=$imagepath."/".$imageName8;


            // $newname9=rand().'.'.$images9->getClientOriginalExtension();
            // $images9->move('storage/app/public/uploads/items',$newname9);
            // $imageName9=$imageName9.$newname9;
            // $full_image9=$imagepath."/".$imageName9;
    
            $items = new Items();
            $items->title=$request->title;
            $items->short_description=$request->short_description;
            $items->long_description=$request->long_description;
            $items->normal_price=$request->normal_price;
            $items->sale_price=$request->sale_price;
            $items->category=$request->category;


            $items->sub_category=$request->sub_category;
            $items->sku_code=$request->sku_code;
            $items->color=$request->color;
            $items->size=$request->size;


            $items->how_to_use=$request->how_to_use;
            $items->reviews=$request->reviews;
            $items->stock_available=$request->stock_available;


            
            //Image Code///
            $items->image=$request->image;    
            $items->image1=$request->image1;
            $items->image2=$request->image2;    
            $items->image3=$request->image3;
            $items->image4=$request->image4;    
            $items->image5=$request->image5;
            $items->image6=$request->image6;    
            $items->image7=$request->image7;
            $items->image8=$request->image8;    
            $items->image9=$request->image9;
            ///Image Code end///    
           
            $items->save();
            
             return response()->json([
            'success' => true,
            'message' => ' Details Added Successfully.',
            'Images'=> 'All Images Added',
            //'image'=> $full_image
            
        ], 200);


         }else {
             
             $items = new Items();
            $items->title=$request->title;
            $items->short_description=$request->short_description;
            $items->long_description=$request->long_description;
            $items->normal_price=$request->normal_price;
            $items->sale_price=$request->sale_price;
            $items->category=$request->category;


            $items->sub_category=$request->sub_category;
            $items->sku_code=$request->sku_code;
            $items->color=$request->color;
            $items->size=$request->size;


            $items->how_to_use=$request->how_to_use;
            $items->reviews=$request->reviews;
            $items->stock_available=$request->stock_available;


            
            //Image Code///
            // $items->image=$request->image;    
            // $items->image1=$request->image1;
            // $items->image2=$request->image2;    
            // $items->image3=$request->image3;
            // $items->image4=$request->image4;    
            // $items->image5=$request->image5;
            // $items->image6=$request->image6;    
            // $items->image7=$request->image7;
            // $items->image8=$request->image8;    
            // $items->image9=$request->image9;
            ///Image Code end///    
           
            $items->save();
            
          
             
             
         }

        //////////////////Image Code End ///////////////

        return response()->json([
            'success' => true,
            'message' => 'Items Details Added Successfully.',
            'Images'=> 'Image Not Added',
            //'image'=> $full_image
            
        ], 200);

         }





public function show_single_product(Request $request , $id)
    {
         $items = Items::find($id);
        // $ids = $request->input('ids', []); // via injected instance of Request
      // $items1 = items::whereIn('id', explode(',', $id))->get();
       // $items1 = items::whereIn('id', explode(',', $id->$request->get()));
        if (is_null($items)) {
            return response()->json([
                'success' => false,
                'message' => 'Items Details Not Found'
            ], 404);
        }
        return response()->json([
                'success' => false,
                'message' => 'Items Details Found',
                'Items' => $items
            ], 404);

       // return $items;
    }


    public function destroy($id)
    {
        $delete_items = Items::find($id);
        $delete_items->delete();
   
        return response()->json([
            'success' => true,
            'message' => 'Item Remove Successfully Done.'
        ], 200);
    }

}
