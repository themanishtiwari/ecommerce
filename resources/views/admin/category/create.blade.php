@extends('layouts.admin')

@section('content')

<!-- container -->
<div class="container">
    <!-- row -->
 <div class="row mb-8">
     <div class="col-md-12">
         <div class="d-md-flex justify-content-between align-items-center">
                <!-- page header -->
             <div>
                 <h2>Add New Category</h2>
                    <!-- breacrumb -->
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0">
                         <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}" class="text-inherit">Dashboard</a></li>
                         <li class="breadcrumb-item"><a href="#" class="text-inherit">Categories</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                     </ol>
                 </nav>
             </div>
             <div>
                 <a href="{{ url('admin/category')}}" class="btn btn-light">Back to Categories</a>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-lg-12 col-12">
         <!-- card -->
         <div class="card mb-6 shadow border-0">
             <!-- card body -->
             <form method="POST" action="{{ url('admin/category')}}" enctype="multipart/form-data">
                {{ @csrf_field() }}

             <div class="card-body p-6 ">
                 <h4 class="mb-4 h5 mt-5">Category Information</h4>

                 <div class="row">
                     <!-- input -->
                     <div class="mb-3 col-lg-6">
                         <label class="form-label">Category Name</label>
                         <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{old('name')}}"
                            required >
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>                            
                        @enderror
                     </div>
                     <!-- input -->
                     <div class="mb-3 col-lg-6">
                         <label class="form-label">Slug</label>
                         <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{old('slug')}}">
                         @error('slug')
                        <small class="text-danger">{{ $message }}</small>                            
                        @enderror
                     </div>
                     <!-- input -->
                     <!-- <div class="mb-3 col-lg-6">
                         <label class="form-label">Parent Category</label>
                         <select class="form-select">
                             <option selected>Category Name</option>
                             <option value="Dairy, Bread & Eggs">Dairy, Bread & Eggs</option>
                             <option value="Snacks & Munchies">Snacks & Munchies</option>
                             <option value="Fruits & Vegetables">Fruits & Vegetables</option>
                         </select>
                     </div> 
                     <div class="mb-3 col-lg-6">
                         <label class="form-label">Date</label>
                         <input type="text" class="form-control flatpickr" placeholder="Select Date">
                     </div>-->


                     <!-- input -->
                     <div class="mb-3 col-lg-12 ">
                         <label class="form-label">Descriptions</label>
                            <textarea class="form-control" name="description" rows="3"
                                 placeholder="Description">{{old('description')}}</textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                     </div>

                     <!-- image-->
                    <div class="mb-3 col-lg-6 ">
                        <label class="form-label">Select Image</label>
                            <input type="file" name="image" id="" class="form-control">
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                    </div>

                     <!-- input -->
                     <div class="mb-3 col-lg-6 ">
                         <label class="form-label" id="productSKU">Status</label><br>
                         <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="status"
                                 id="inlineRadio1" value="0" checked>
                             <label class="form-check-label" for="inlineRadio1">Active</label>
                         </div>
                         <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="status"
                                 id="inlineRadio2" value="1" >
                             <label class="form-check-label" for="inlineRadio2">Disabled</label>
                         </div>

                         @error('status')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                     </div>

                    
                     <h4 class="mb-4 h5 mt-5">Meta Data</h4>
                     <div class="mb-3 col-lg-6">
                         <!-- input -->
                         <div class="mb-3">
                             <label class="form-label">Meta Title</label>
                             <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}" placeholder="Title">
                             @error('meta_title')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                         </div>
                     </div>
                     <div class="mb-3 col-lg-6">
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label">Keywords</label>
                            <input type="text" name="meta_keyword" class="form-control" value="{{old('meta_keyword')}}" placeholder="Title">
                            @error('meta_keyword')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                        </div>
                    </div>
                     <div class="mb-3 col-lg-12">
                         <!-- input -->
                         <div class="mb-3">
                             <label class="form-label">Meta Description</label>
                             <textarea class="form-control" name="meta_description" rows="3"
                                 placeholder="Meta Description">{{old('meta_description')}}</textarea>
                            @error('meta_description')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                         </div>
                     </div>
                     <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                 </div>             
             </div>
            </form>
         </div>

     </div>


 </div>
</div>

@endsection