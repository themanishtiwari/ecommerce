<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Category;



class CategoryController extends Controller
{
    function index(){
        return view('admin.category.index');
    }

    function create(){
        return view('admin.category.create');
    }

    //insert query
    function store(CategoryFormRequest $request){
        $validatedData= $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['description'];
        if($request->hasFile('image')){
            $file= $request->file('image');
            $ext= $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;

            $file->move('uploads/category',$filename);
            $category->image=$filename;
        }
        $category->status= $validatedData['status'];

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->save();      
        // print_r($validatedData);
        
        return redirect('admin/category')->with('message','Category Created Successfully');;
    }

    //edit page
    function edit(Category $category){
        return view('admin/category/edit', compact('category'));
    }

    //update query
    function update(CategoryFormRequest $request, $category){

        $validatedData= $request->validated(); 

        $category= Category::findOrFail($category);

        if($request->hasFile('image')){
            //delete old image
            $oldimg= 'uploads/category/'.$category->image;
            if(File::exists($oldimg)){                
                File::delete($oldimg);
            }
            //insert new image
            $file= $request->file('image');
            $ext= $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            //echo $filename;

            $file->move('uploads/category',$filename);
            $category->image= $filename;
        }
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['description'];
        $category->status= $validatedData['status'];
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->save();      
        // print_r($validatedData);
        
        return redirect('admin/category')->with('message','Category Updated Successfully');
    }

    function delete(Request $request){
        $category= Category::findOrFail($request->delete);
        $img='uploads/category/'.$category->image;
        if(File::exists($img)){                
            File::delete($img);
        }
        $category->delete();
        return redirect('admin/category')->with('message','Category Deleted Successfully');
    }

}
