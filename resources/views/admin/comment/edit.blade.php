@extends('admin.layouts.master')

@section('main_content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Comment</h3>
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
                                <form action="{{route('admin.comment.update', [$comment->id])}}" method="post">
                                    @csrf
                                    @method('PUT')


                                    <div class="form-group">
                                        <label for="comment_msg">Comment message</label>
                                        <textarea name="comment_msg" id="comment_msg" class="form-control @error('comment_msg') is-invalid @enderror" placeholder="Enter comment message" cols="30" rows="3">{{$comment->comment_msg}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="status" @if($comment->status === 'active') checked @endif>
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