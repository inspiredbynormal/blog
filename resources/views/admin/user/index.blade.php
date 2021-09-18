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
                            <h3 class="card-title">User List</h3>
                            <a href="{{route('admin.user.create')}}" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus"></i> Add New User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="listTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Role</th>
                                    <th>User Image</th>
                                    <th>User Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @forelse($users as $user)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td><img src="{{($user->avatar != NULL) ? asset('storage/media/user/'. $user->avatar) : '' }}" alt="" class="img-fluid list-image"></td>
                                    <td><span class="badge {{($user->status == 'active') ?  'badge-success' : 'badge-danger'}}">{{$user->status}}</span></td>
                                    <td>
                                        <div class="action_btn_box">
                                            <a href="{{route('admin.user.edit', [$user->id])}}" class="btn bg-gradient-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('admin.user.destroy', [$user->id])}}" method="post">
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
                                    <td colspan="7" class="text-center">No User Found</td>
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