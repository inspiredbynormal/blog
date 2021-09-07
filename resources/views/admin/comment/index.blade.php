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
                            <h3 class="card-title">Comment List</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="listTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Comment</th>
                                    <th>User</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @forelse($comments as $comment)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$comment->comment_msg}}</td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{Str::limit($comment->post->post_title, 25)}}</td>
                                    <td>{{$comment->status}}</td>

                                    <td>
                                        <div class="action_btn_box">
                                            <a href="{{route('admin.comment.edit', [$comment->id])}}" class="btn bg-gradient-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('admin.comment.destroy', [$comment->id])}}" method="post">
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
                                    <td colspan="6" class="text-center">No Comment Found</td>
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