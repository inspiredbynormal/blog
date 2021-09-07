@extends('admin.layouts.master')

@section('main_content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
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
                                <form action="{{route('admin.user.update', [$user->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">User Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{$user->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">User Role</label>
                                        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
                                            <option value="editor" @if($user->role == 'editor') selected @endif >Editor</option>
                                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">User Avatar</label>
                                        <div class="mb-2">
                                            <img class="img-fluid" style="width:100px;" src="{{($user->avatar != NULL) ? asset('storage/media/user/'. $user->avatar) : '' }}" alt="">
                                        </div>

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="avatar">
                                            <label class="custom-file-label" for="customFile">Choose category image</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="status" @if($user->status === 'active') checked @endif>
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