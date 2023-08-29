<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                @if (auth()->user()->role = \App\Models\User::ROLE_ADMIN)
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            {{ __('Administration') }}
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ __('Main page') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>
                            {{ __('Personal account') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.liked') }}" class="nav-link">
                        <i class="nav-icon far fa-heart"></i>
                        <p>
                            {{ __('Liked posts') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <i class="nav-icon far fa-comment"></i>
                    <p>
                        {{ __('Comments') }}
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
