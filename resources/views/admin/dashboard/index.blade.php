@extends('admin.layouts.master')

@section('main_content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($posts) > 0 ? count($posts) : 0}}</h3>
                        <p>Posts</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{count($comments) > 0 ? count($comments) : 0}}</h3>
                        <p>Comments</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            @if(session('ROLE') == 'admin')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{count($categories) > 0 ? count($categories) : 0}}</h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{count($users) > 0 ? count($users) : 0}}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            @endif
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
@endsection