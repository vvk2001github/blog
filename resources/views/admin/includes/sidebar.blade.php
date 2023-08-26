<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ __('Main page') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Users') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="nav-icon far fa-clipboard"></i>
                    <p>
                        {{ __('Posts') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        {{ __('Categories') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tags.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                        {{ __('Tags') }}
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
