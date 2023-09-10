@extends('layouts.admin')

@section('content')

<!-- container -->
<div class="container">
    <!-- row -->
    <div class="container">
      {{-- alert message --}}
    <svg style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
    </svg>
      @if (session('message'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{ session('message') }}
        </div>
      </div>
      @endif
        <div class="row mb-8">
          <div class="col-md-12">
            <!-- page header -->
            <div class="d-md-flex justify-content-between align-items-center">
              <div>
                <h2>Products</h2>
                  <!-- breacrumb -->
                  <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="{{ url('admin/products/create')}}" class="btn btn-primary">Add Product</a>
              </div>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row ">
          <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
              <div class="px-6 py-6 ">
                <div class="row justify-content-between">
                  <!-- form -->
                  <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                    <form class="d-flex" role="search">
                      <input class="form-control" type="search" placeholder="Search Products" aria-label="Search">
                    </form>
                  </div>
                  <!-- select option -->
                  <div class="col-lg-2 col-md-4 col-12">
                    <select class="form-select">
                      <option selected>Status</option>
                      <option value="1">Active</option>
                      <option value="2">Deactive</option>
                      <option value="3">Draft</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- card body -->
              <div class="card-body p-0">
                <!-- table -->
                <div class="table-responsive">
                  <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                    <thead class="bg-light">
                      <tr>
                        {{-- <th>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                            <label class="form-check-label" for="checkAll">

                            </label>
                          </div>
                        </th> --}}
                        <th>Image</th>
                        <th>Proudct Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($products as $product)
                        
                      
                      <tr>
                        <td>
                          <a href="#!"> <img src="../assets/images/products/product-img-1.jpg" alt=""
                              class="icon-shape icon-md"></a>
                        </td>
                        <td><a href="#" class="text-reset">{{$product->name}}</a></td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->brand}}</td>
                        <td>
                          <span class="badge {{$product->status==0 ? 'bg-light-primary text-dark-primary':'bg-light-danger text-dark-danger'}} ">{{$product->status==0 ? 'Active':'inactive'}}</span>
                        </td>
                        <td>{{$product->original_price}}</td> 
                        <td>{{$product->selling_price}}</td>
                        <td>{{$product->quantity}}</td>

                        <td>
                          <div class="dropdown">
                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="feather-icon icon-more-vertical fs-5"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{url('admin/products/'.$product->id.'/edit')}}"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                                <form action="{{url('admin/products/'.$product->id)}}" method="post">
                                  @method('delete')
                                  @csrf
                                  <li><button class="dropdown-item" type="submit" onclick="return confirm('Are you sure you want to delete this product?')"><i class="bi bi-trash me-3"></i>Delete</button></li>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="7">No Record Found</td>
                      </tr>
                        
                      @endforelse
                      

                      

                    </tbody>
                  </table>

                </div>
              </div>
              <div class=" border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                <span>Showing 1 to 8 of 12 entries</span>
                <nav class="mt-2 mt-md-0">
                  <ul class="pagination mb-0 ">
                    <li class="page-item disabled"><a class="page-link " href="#!">Previous</a></li>
                    <li class="page-item"><a class="page-link active" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                  </ul>
                </nav>
              </div>
            </div>

          </div>

        </div>
      </div>
</div>

@endsection