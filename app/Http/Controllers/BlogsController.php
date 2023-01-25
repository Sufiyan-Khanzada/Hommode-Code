<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Brands;
use Validator;

class BlogsController extends Controller
{
    //
     public function allblogs()
    {
        $blogs = Blogs::all();
         return $blogs; 
    }

 public function create_blogs(Request $request)
    {
         $input = $request->all();
   
        $validator = Validator::make($input, [
            'title'=>'required',
            'content'=>'nullable|string',
            'short_content' => 'nullable|string',
            'featured_image'=>'nullable',
            'author'=>'nullable',
            'post_status'=>'nullable',
             
             
             

    ]);
   
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }  


         $images=$request->file('featured_image');
         $imageName="";
         $imagepath="https://apis.amexcars.ae/storage/app/public/uploads/blogs";

         if($images!=''){
           

            $newname=rand().'.'.$images->getClientOriginalExtension();
            $images->move('storage/app/public/uploads/blogs',$newname);
            $imageName=$imageName.$newname;

            $full_image=$imagepath."/".$imageName;

            $blogs = new Blogs();
            $blogs->title=$request->title;
            $blogs->slug=$request->slug;
            $blogs->meta_title=$request->meta_title;
            $blogs->meta_description=$request->meta_description;
            $blogs->meta_keywords=$request->meta_keywords;
            $blogs->content=$request->content;
            $blogs->short_content=$request->short_content;
            $blogs->featured_image=$input['featured_image']=$full_image;           
            $blogs->author=$request->author;   
            $blogs->post_status=$request->post_status;
            $blogs->faqs_list=$request->faqs_list;       
            $blogs->selected_cars=$request->selected_cars;
             $blogs->blogs_list=$request->blogs_list;    

            
            $blogs->save();

             return response()->json([
            'success' => true,
            'message' => 'Blogs Details Added Successfully.',
           // 'data'=> $input,
           // 'image'=> $full_image
            
        ], 200);


         }
         else{
            $blogs = new Blogs();
            $blogs->title=$request->title;
            $blogs->slug=$request->slug;
            $blogs->meta_title=$request->meta_title;
            $blogs->meta_description=$request->meta_description;
            $blogs->meta_keywords=$request->meta_keywords;
            $blogs->content=$request->content;
            $blogs->short_content=$request->short_content;
            //$blogs->featured_image=$input['featured_image']=$full_image;           
            $blogs->author=$request->author;   
            $blogs->post_status=$request->post_status;
            $blogs->faqs_list=$request->faqs_list;       
            $blogs->selected_cars=$request->selected_cars;
             $blogs->blogs_list=$request->blogs_list;    

            
            $blogs->save();

             return response()->json([
            'success' => true,
            'message' => 'Blogs Details Added Successfully.',
            'Image_status'=>"Image Not Selected"
           // 'data'=> $input,
            //'image'=> $full_image
            
        ], 200);

         }
         
}

  public function update_blogs(Request $request , $id)
    {

         $input = $request->all();
         $images=$request->file('featured_image');
         $imageName="";
          $imagepath="https://apis.amexcars.ae/storage/app/public/uploads/blogs";

         
         if($images!=''){
            $newname=rand().'.'.$images->getClientOriginalExtension();
            $images->move('storage/app/public/uploads/blogs',$newname);
            $imageName=$imageName.$newname;

            $full_image=$imagepath."/".$imageName;

            $blogs = new Blogs();
            $blogs = Blogs::find($id);
            
            if($blogs){
            $blogs->title=$request->title;
            $blogs->slug=$request->slug;
            $blogs->meta_title=$request->meta_title;
            $blogs->meta_description=$request->meta_description;
            $blogs->meta_keywords=$request->meta_keywords;
            $blogs->content=$request->content;
            $blogs->short_content=$request->short_content;
            $blogs->featured_image=$input['featured_image']=$full_image;           
            $blogs->author=$request->author;     
                $blogs->post_status=$request->post_status;
                $blogs->faqs_list=$request->faqs_list;       
            $blogs->selected_cars=$request->selected_cars;
             $blogs->blogs_list=$request->blogs_list;    
        
            $blogs->save();
         }  
         }
         $blogs = new Blogs();
         $blogs = Blogs::find($id);    
         if($blogs){

            $blogs->title=$request->title;
            $blogs->slug=$request->slug;
            $blogs->meta_title=$request->meta_title;
            $blogs->meta_description=$request->meta_description;
            $blogs->meta_keywords=$request->meta_keywords;
            $blogs->content=$request->content;
            $blogs->short_content=$request->short_content;
            //$blogs->featured_image=$input['featured_image']=$full_image;           
            $blogs->author=$request->author;
                $blogs->post_status=$request->post_status;
                $blogs->faqs_list=$request->faqs_list;       
            $blogs->selected_cars=$request->selected_cars;
             $blogs->blogs_list=$request->blogs_list;    

        
            $blogs->save();
         }    
       
          return response()->json([
            'success' => true,
            'message' => 'Blogs Details Updated Successfully.'
        ], 200);
    }

 public function show_with_slug($slug)
    {
        $blogs = Blogs::where('slug',$slug)->first();
  
        if (is_null($blogs)) {
            return response()->json([
                'success' => false,
                'message' => 'Blogs Details Not Found',
                'slug'=> $slug
            ], 404);
        }
        return $blogs;
    }

  public function show_blogs($id)
    {
        $blogs = Blogs::find($id);
  
        if (is_null($blogs)) {
            return response()->json([
                'success' => false,
                'message' => 'Blogs Details Not Found'
            ], 404);
        }
        return $blogs;
    }


     public function destroy_blog($id)
    {
        $delete_blogs = Blogs::find($id);
        $delete_blogs->delete();
   
        return response()->json([
            'success' => true,
            'message' => 'Blogs Remove Successfully Done.'
        ], 200);
    }
   
    public function multipleblogsfaqs($id)
    {
        // $cars1 = Cars::find($id);
        // $ids = $request->input('ids', []); // via injected instance of Request
       $cars1 = Faqs::whereIn("id", explode(',', $id))->get();
       // $cars1 = Cars::whereIn('id', explode(',', $id->$request->get()));
       
       if(is_null($cars1)) {
            return response()->json([
                'success' => true,
                'message' => 'Faqs are not Found'
            ], 200);
        }
        return response()->json([
                'success' => true,
                'message' => 'Faqs are Found',
                'data' => $cars1
            ], 200);
        
}

public function multipleblogsids($id)
    {
        // $cars1 = Cars::find($id);
        // $ids = $request->input('ids', []); // via injected instance of Request
       $cars1 = Blogs::whereIn("id", explode(',', $id))->get();
       // $cars1 = Cars::whereIn('id', explode(',', $id->$request->get()));
       
       if(is_null($cars1)) {
            return response()->json([
                'success' => true,
                'message' => 'Blogs are not Found'
            ], 200);
        }
        return response()->json([
                'success' => true,
                'message' => 'Blogs are Found',
                'data' => $cars1
            ], 200);
        
}

}