@extends('admin.layouts.master')

@section('main_content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-header">
                        <div class="list-header">
                            <h3 class="card-title">Category List</h3>
                            <a href="{{route('admin.category.create')}}" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus"></i> Add New Category</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="listTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Category Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @forelse($categories as $category)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td><img src="{{($category->category_image != NULL) ? asset('storage/media/category/'. $category->category_image) : '' }}" alt="" class="img-fluid list-image"></td>
                                    <td>{{$category->status}}</td>
                                    <td>
                                        <div class="action_btn_box">
                                            <a href="{{route('admin.category.edit', [$category->id])}}" class="btn bg-gradient-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('admin.category.destroy', [$category->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="#" class="btn btn-sm bg-gradient-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Category Found</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
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