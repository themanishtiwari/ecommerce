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
                 <h2>Edit Category</h2>
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
             <form method="POST" action="{{ url('admin/category/'.$category->id)}}" enctype="multipart/form-data">
                {{ @csrf_field() }}
                @method('PUT')

             <div class="card-body p-6 ">
                 <h4 class="mb-5 h5">Category Image</h4>
                 <div class="mb-4 d-flex">
                     <div class="position-relative" >
                         <img class="image  icon-shape icon-xxxl bg-light rounded-4" src="{{url('uploads/category/'.$category->image) }}" alt="Image">

                         <div class="file-upload position-absolute end-0 top-0 mt-n2 me-n1">
                             <input type="file" class="file-input" name="image">
                             <span class="icon-shape icon-sm rounded-circle bg-white">
                             <svg  width="12" height="12" fill="currentColor" class="bi bi-pencil-fill text-muted" viewBox="0 0 16 16">
                                 <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                               </svg>
                             </span>
                             @error('image')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                           </div>
                     </div>
                 </div>
                 <h4 class="mb-4 h5 mt-5">Category Information</h4>

                 <div class="row">
                     <!-- input -->
                     <div class="mb-3 col-lg-6">
                         <label class="form-label">Category Name</label>
                         <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{$category->name}}"
                            required >
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>                            
                        @enderror
                     </div>
                     <!-- input -->
                     <div class="mb-3 col-lg-6">
                         <label class="form-label">Slug</label>
                         <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{$category->slug}}">
                         @error('slug')
                        <small class="text-danger">{{ $message }}</small>                            
                        @enderror
                     </div>


                     <!-- input -->
                     <div class="mb-3 col-lg-12 ">
                         <label class="form-label">Descriptions</label>
                            <textarea class="form-control" name="description" rows="3"
                                 placeholder="Description">{{$category->description}}</textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                     </div>

                     <!-- image-->
                    {{-- <div class="mb-3 col-lg-6 ">
                        <label class="form-label">Select Image</label>
                            <input type="file" name="image" id="" class="form-control">
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                    </div> --}}

                     <!-- input -->
                     <div class="mb-3 col-lg-6 ">
                         <label class="form-label" id="productSKU">Status</label><br>
                         <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="status"
                                 id="inlineRadio1" value="0" {{$category->status==0 ? 'checked':''}}>
                             <label class="form-check-label" for="inlineRadio1">Active</label>
                         </div>
                         <!-- input -->
                         <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="status"
                                 id="inlineRadio2" value="1" {{$category->status==1 ? 'checked':''}}>
                             <label class="form-check-label" for="inlineRadio2">Disabled</label>
                         </div>
                         <!-- input -->
                         @error('status')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                     </div>

                    
                     <h4 class="mb-4 h5 mt-5">Meta Data</h4>
                     <div class="mb-3 col-lg-6">
                         <!-- input -->
                         <div class="mb-3">
                             <label class="form-label">Meta Title</label>
                             <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}" placeholder="Title">
                             @error('meta_title')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                         </div>
                     </div>
                     <div class="mb-3 col-lg-6">
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label">Keywords</label>
                            <input type="text" name="meta_keyword" class="form-control" value="{{$category->meta_keyword}}" placeholder="Title">
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
                                 placeholder="Meta Description">{{$category->meta_description}}</textarea>
                            @error('meta_description')
                            <small class="text-danger">{{ $message }}</small>                            
                            @enderror
                         </div>
                     </div>
                     <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                 </div>             
             </div>
            </form>
         </div>

     </div>


 </div>
</div>

@endsection