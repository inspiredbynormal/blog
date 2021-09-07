<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <span class="brand-text font-weight-light">Demo Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <br>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.post.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Post</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.comment.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Comments</p>
                    </a>
                </li>
                @if(session('ROLE') == 'admin')
                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Category</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>

                @endif


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>