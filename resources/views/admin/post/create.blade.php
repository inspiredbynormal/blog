@extends('admin.layouts.master')

@section('main_content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div>
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="">
                                    @if(session('msg'))
                                    <div class="alert alert-success">
                                        {{session('msg')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                
                                <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="post_title">Post Title</label>
                                        <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title" name="post_title" placeholder="Enter post name" value="{{old('post_title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Post Category</label>
                                        <select name="post_category" id="post_category" class="form-control @error('post_category') is-invalid @enderror">
                                            <option value="" class="d-none">Select Category</option>
                                            @forelse($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @empty
                                            <option value="">No Category Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_desc">Post Description</label>
                                        <textarea name="post_desc" id="post_desc" class="form-control @error('post_desc') is-invalid @enderror" placeholder="Enter post description" cols="30" rows="5">{{old('post_desc')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_short_desc">Post Short Description</label>
                                        <textarea name="post_short_desc" id="post_short_desc" class="form-control @error('post_short_desc') is-invalid @enderror" placeholder="Enter post description" cols="30" rows="3">{{old('post_short_desc')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="post_image">
                                            <label class="custom-file-label" for="customFile">Choose post image</label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="status">
                                            <label class="custom-control-label" for="customSwitch3">Change Status</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
@endsection