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
          <h2>Add New Product</h2>
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
          <a href="{{ url('admin/products')}}" class="btn btn-light">Back to Products</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-12">
      <!-- card -->
      <div class="card mb-6 shadow border-0">
        <!-- card body -->
        <div class="card-body p-6 ">

          <!-- Tabs-->
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product"
                type="button" role="tab" aria-controls="product" aria-selected="true">Product</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab"
                aria-controls="seo" aria-selected="false">SEO</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button"
                role="tab" aria-controls="details" aria-selected="false">Details</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button"
                role="tab" aria-controls="image" aria-selected="false">Image</button>
            </li>
          </ul>
          @if($errors->any())
          <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>              
            @endforeach
          </div>
          @endif
          <form action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="tab-content" id="myTabContent">
              <!-- Product Modal -->
              <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                <h4 class="my-4 h5">Product Information</h4>
                <div class="row">
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{old('name')}}">
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Product Category</label>
                    <select name="category_id" class="form-select">
                      <option selected disabled>Product Category</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}" {{$category->id==old('category_id') ? 'selected':''}}>{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{old('slug')}}" required>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Brand</label>
                    <select name="brand" class="form-select">
                      <option selected disabled>Select Brand</option>
                      @foreach($brands as $brand)
                      <option value="{{ $brand->name }}" {{$brand->name==old('brand') ? 'selected':''}}>{{ $brand->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Small Description</label>
                    <textarea type="text" name="small_description" class="form-control" rows="4" placeholder="Small Discription" required>{{old('small_description')}}</textarea>
                  </div>
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control" rows="4" placeholder="Discription" required>{{old('description')}}</textarea>
                  </div>

                </div>
              </div>

              <!-- SEO Part Modal -->
              <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                <h4 class="my-4 h5">SEO Part</h4>
                <div class="row">
                  
                  <div class="mb-3 col-lg-12">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="{{old('meta_title')}}" required>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-12">
                    <label class="form-label">Meta Description</label>
                    <textarea type="text" name="meta_description" class="form-control" placeholder="Meta Description" rows="3" required>{{old('meta_description')}}</textarea>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-12">
                    <label class="form-label">Meta Keyword</label>
                    <textarea type="text" name="meta_keyword" class="form-control" placeholder="Meta Keyword" rows="3" required>{{old('meta_keyword')}}</textarea>
                  </div>
              </div>
              </div>

              <!-- Details part Modal -->
              <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                <h4 class="my-4 h5">Product Details</h4>
                <div class="row">
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Original Price</label>
                    <input type="text" class="form-control" name="original_price" placeholder="Product Name" value="{{old('original_price')}}" required>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Selling Price</label>
                    <input type="text" class="form-control" name="selling_price" placeholder="Product Name" value="{{old('selling_price')}}" required>
                  </div>
                  <!-- input -->
                  <div class="mb-3 col-lg-6">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{old('quantity')}}" required>
                  </div>
                  <!-- input -->
                  <div class="mb-4 col-lg-6">
                    <label class="form-label">Trand</label>
                      <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" name="tranding" id="flexSwitchTranding" {{old('tranding')=='1' ? 'checked':''}}>
                      <label class="form-check-label" for="flexSwitchTranding">Tranding</label>
                      </div>
                  </div>
                  <!-- input -->
                  <div class="mb-3">
                    <label class="form-label" id="status">Status</label><br>
                    <!-- <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1" checked>
                      <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                      <label class="form-check-label" for="inlineRadio2">Disabled</label>
                    </div> -->
                    <div class="form-check form-check-inline">
                      <input class="form-check-input mx-2" type="checkbox" name="status" style="width: 20px; height: 20px;" {{old('status')=='0' ? '':'checked'}}>
                      <label class="form-check-label" for="status"> Hide the Product</label>
                    </div>
                    
                  </div>
                  <!-- End input -->
                  </div>
              </div>
              
              <!-- Image Part Modal -->
              <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                <div>
                  <div class="mb-3 col-lg-12 mt-5">
                    <!-- heading -->
                    <h4 class="mb-3 h5">Product Images</h4>
                    <!-- input -->
                      <div class="fallback">
                        <input name="image[]" type="file" multiple>
                      </div>
                  </div>
                </div>
              </div>



            </div>
            <!-- End Tabs-->
            <div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

        </div>
      </div>

    </div>

  </div>


</div>


@endsection