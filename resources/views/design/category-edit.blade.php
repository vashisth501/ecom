@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Edit Category</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
        </ol>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-10">
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Update Name</label>
                            <input type="text" name="category_name" class="form-control " id="name" aria-describedby=""
                                   value="{{$category->category_name}}">

                        </div>
                        <div class="form-group">
                            <label for="desc">Update Description</label>
                            <input type="text" name="category_description" value="{{$category->category_description}}" id="desc" class="form-control ">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " value="{{Storage::url($category->category_images)}}" id="customFile" name="category_image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
