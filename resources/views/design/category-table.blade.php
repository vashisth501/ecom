@extends('admin.layout.main')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Tables</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active" aria-current="page">category Tables</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>S No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($categories))
                                @foreach($categories as $key=>$category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{Storage::url($category->category_images)}}" width="100"></td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_description}}</td>
                                <td>
                                    <a href="{{route('category.edit',[$category->id])}}" class="btn btn-secondary text-white" style="cursor: pointer">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('category.delete',[$category->id])}}" method="post" onsubmit="return confirmDelete();">
                                        @csrf
                                        {{method_field('post')}}
                                        <button type="submit" class="btn btn-danger text-white" style="cursor: pointer">Delete</button>
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            @else
                            <td>No Category Created Yet!:(</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
@endsection
