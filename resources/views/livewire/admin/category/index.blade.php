<div class="container">

    {{-- alert message --}}
    <svg style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        {{-- <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol> --}}
      </svg>
      @if (session('message'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{ session('message') }}
        </div>
      </div>
      @endif
      {{-- <div class="alert alert-warning d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          An example warning alert with an icon
        </div>
      </div> --}}


      
    <!-- row -->
    <div class="row mb-8">
        <div class="col-md-12">
            <div class="d-md-flex justify-content-between align-items-center">
                <!-- pageheader -->
                <div>
                    <h2>Categories</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        </ol>
                    </nav>
                </div>
                <!-- button -->
                <div>
                    <a href="{{ url('admin/category/create')}}" class="btn btn-primary">Add New Category</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
                <div class=" px-6 py-6 ">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                            <!-- form -->
                            <form class="d-flex" role="search">
                                <input class="form-control" type="search" placeholder="Search Category"
                                    aria-label="Search">
                            </form>
                        </div>
                        <!-- select option -->
                        <div class="col-xl-2 col-md-4 col-12">
                            <select class="form-select">
                                <option selected>Status</option>
                                <option value="Published">Published</option>
                                <option value="Unpublished">Unpublished</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body p-0">
                    <!-- table -->
                    <div class="table-responsive ">
                        <table
                            class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                            <thead class="bg-light">
                                <tr>
                                    {{-- <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                            <label class="form-check-label" for="checkAll">

                                            </label>
                                        </div>
                                    </th> --}}
                                    <th>ID</th>
                                    <th>Icon</th>
                                    <th> Name</th>
                                    <th>Proudct</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($categories as $category)
                                    
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>
                                        <a href="#!"> <img src="{{url('uploads/category/'.$category->image) }}" alt=""
                                                class="icon-shape icon-sm"></a>
                                    </td>
                                    <td><a href="#" class="text-reset">{{ $category->name }}</a></td>
                                    <td>12</td>

                                    <td>
                                        <span class="badge {{ $category->status == '0' ? 'bg-light-primary text-dark-primary':'bg-light-danger text-dark-danger'}} text-dark-primary">{{ $category->status == '0' ? 'Published':'Unpublished'}}</span>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                {{-- <li>
                                                            <form action="{{url('admin/category/delete')}}" method="post" >
                                                                {{ @csrf_field() }}
                                                                <button class="dropdown-item" type="submit" name="delete" value="{{$category->id}}" onclick="return confirm('Are you sure you want to delete?')"><i
                                                                    class="bi bi-trash me-3"></i>Delete</button>
                                                            </form>
                                                        </li> --}}
                                                    <li>
                                                        <a class="dropdown-item" wire:click="deleteIt({{$category->id}})" data-bs-toggle="modal" data-bs-target="#userModal"><i
                                                            class="bi bi-trash me-3"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                    <li>
                                                    <a class="dropdown-item" href="{{url('admin/category/edit/'.$category->id)}}"><i
                                                            class="bi bi-pencil-square me-3 "></i>Edit</a>
                                                    </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                {{-- <tr>

                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="categoryTen">
                                            <label class="form-check-label" for="categoryTen">

                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#!"> <img src="{{ asset('assets/images/icons/petfoods.svg')}}" alt=""
                                                class="icon-shape icon-sm"></a>
                                    </td>
                                    <td><a href="#" class="text-reset">Pet Food</a></td>
                                    <td>25</td>

                                    <td>
                                        <span class="badge bg-light-danger text-dark-danger">Unpublished</span>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="bi bi-trash me-3"></i>Delete</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="bi bi-pencil-square me-3 "></i>Edit</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr> --}}
                                

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="border-top d-md-flex justify-content-between align-items-center  px-6 py-6">
                    
                    <span></span>
                    {{$categories->links()}}
                     {{-- <nav class="mt-2 mt-md-0">
                        <ul class="pagination mb-0 ">
                            
                            <li class="page-item disabled"><a class="page-link " href="#!">Previous</a></li>
                            <li class="page-item"><a class="page-link active" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                        </ul>
                    </nav>  --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                <div class="d-flex justify-content-center ">
                    <button type="button" class="btn btn-secondary close-btn mx-2" data-bs-dismiss="modal">Close</button>
                    <form>
                    <button type="submit" wire:click.prevent="delete()" class="btn btn-danger" data-bs-dismiss="modal">Yes, Delete</button>
                    </form>
                </div>
                </div>
        </div>
        </div>
    </div>


    
    {{-- <div wire:ignore.self class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div> --}}
    
</div>