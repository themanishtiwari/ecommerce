<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\ProductImages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductsController extends Controller
{
    function index(){
        $products=Products::all();
        return view('admin.product.index', compact('products'));

    }

    function create(){
        $categories=Category::all();
        $brands= Brands::all('name');
        return view('admin.product.create', compact('categories', 'brands'));

    }
    function store(ProductFormRequest $request){
        $data=$request->validated();

        $category= Category::findOrFail($data['category_id']);
        $product= $category->product()->create([
            'category_id'=>$data['category_id'],
            'name'=>$data['name'],
            'slug'=>Str::slug($data['slug']),
            'brand'=>$data['brand'],
            'small_description'=>$data['small_description'],
            'description'=>$data['description'],
            'original_price'=>$data['original_price'],
            'selling_price'=>$data['selling_price'],
            'quantity'=>$data['quantity'],
            'tranding'=>$request->tranding== true ? '1':'0',
            'status'=>$request->status== true ? '1':'0',
            'meta_title'=>$data['meta_title'],
            'meta_keyword'=>$data['meta_keyword'],
            'meta_description'=>$data['meta_description'],
            
        ]);

        //return $product->id;

        if($request->hasFile('image')){
            $uploadpath= 'uploads/products/';
            $i=1;
            foreach($request->file('image') as $imageFile){
                $extention= $imageFile->getClientOriginalExtension();
                $filename=time().$i++.'.'.$extention;
                $imageFile->move($uploadpath,$filename);
                $finalImagePath= $uploadpath.$filename;

                $product->productImage()->create([
                    'product_id'=>$product->id,
                    'image'=>$finalImagePath,
                ]);
            }
        }

        return redirect('/admin/products')->with('message','product added successfully');
        // $req=$request->all();
        //print_r($product);
    }


    function edit(int $product_id){
        $categories=Category::all();
        $brands= Brands::all('name');
        $product= Products::findOrFail($product_id);
        return view('admin.product.edit', compact('categories','brands','product'));
    }

    
    function update(ProductFormRequest $request, int $product_id){
        $data=$request->validated();

        $category= Category::findOrFail($data['category_id']);
        $product= Products::findOrFail($product_id);
        if($category && $product){
            $product= $product->update([
            'category_id'=>$data['category_id'],
            'name'=>$data['name'],
            'slug'=>Str::slug($data['slug']),
            'brand'=>$data['brand'],
            'small_description'=>$data['small_description'],
            'description'=>$data['description'],
            'original_price'=>$data['original_price'],
            'selling_price'=>$data['selling_price'],
            'quantity'=>$data['quantity'],
            'tranding'=>$request->tranding== true ? '1':'0',
            'status'=>$request->status== true ? '1':'0',
            'meta_title'=>$data['meta_title'],
            'meta_keyword'=>$data['meta_keyword'],
            'meta_description'=>$data['meta_description'],
            ]);
        

            // $category= Category::findOrFail($data['category_id'])->product()->where('id', $product_id)->first();
            // if($product){
            // $product= $product->update([
            //     'category_id'=>$data['category_id'],
            //     'name'=>$data['name'],
            //     'slug'=>Str::slug($data['slug']),
            //     'brand'=>$data['brand'],
            //     'small_description'=>$data['small_description'],
            //     'description'=>$data['description'],
            //     'original_price'=>$data['original_price'],
            //     'selling_price'=>$data['selling_price'],
            //     'quantity'=>$data['quantity'],
            //     'tranding'=>$request->tranding== true ? '1':'0',
            //     'status'=>$request->status== true ? '1':'0',
            //     'meta_title'=>$data['meta_title'],
            //     'meta_keyword'=>$data['meta_keyword'],
            //     'meta_description'=>$data['meta_description']
            // ]);
            
            if($request->hasFile('image')){
                $product= Products::findOrFail($product_id);
                $uploadpath= 'uploads/products/';
                $i=1;
                foreach($request->file('image') as $imageFile){
                    $extention= $imageFile->getClientOriginalExtension();
                    $filename=time().$i++.'.'.$extention;
                    $imageFile->move($uploadpath,$filename);
                    $finalImagePath= $uploadpath.$filename;

                    $product->productImage()->create([
                        'product_id'=>$product_id,
                        'image'=>$finalImagePath,
                    ]);
                }
            }
        return redirect('/admin/products')->with('message','product Updated successfully');
        // $req=$request->all();
        //print_r($product);
        }
        else{
            return redirect('/admin/products')->with('message','Product ID not found');
        }
    }


    function deleteImage(int $image_id){

        $image= ProductImages::findOrFail($image_id);
        if(File::exists($image->image)){
            File::delete($image->image);
        }
        $image->delete();
        return redirect()->back()->with('message', 'Image deleted Successfully');

    }

    function deleteProduct(int $product_id){
        $product=Products::findOrFail($product_id);
        if($product->productImage){
            foreach($product->productImage as $image){
               if(File::exists($image->image)){
                    File::delete($image->image);
               }
               $image->delete();
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
}


