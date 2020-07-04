<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>


                {{-- OCSS_DATA  --}}
                @can('product_access')
                    <li class="nav-item has-treeview
                    {{ request()->is('admin/permissions*') ? 'menu-open' : '' }}
                    {{ request()->is('admin/roles*') ? 'menu-open' : '' }}
                    {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-chart-line"> </i>
                            <p>
                                <span>{{ trans('global.product.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- STUDENTS --}}
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}"
                                       class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                        <i class="fas fa-list">

                                        </i>
                                        <p>
                                            <span>Students</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            {{-- STUDENTS End --}}

                            {{-- MESSAGES_PRIVATE --}}
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ url("/admin/messages") }}"
                                       class="nav-link {{ request()->is('admin/messages/') || request()->is('admin/messages/*') ? 'active' : '' }}">
                                        <i class="fas fa-car">

                                        </i>
                                        <p>
                                            <span>Messages: Private</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            {{-- MESSAGES_PRIVATE End --}}

                            {{-- MESSAGES_PUBLIC --}}
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ url("/admin/messages/public") }}"
                                       class="nav-link {{ request()->is('admin/messages/public') || request()->is('admin/messages/public/*') ? 'active' : '' }}">
                                        <i class="fas fa-car">

                                        </i>
                                        <p>
                                            <span>Messages: Public</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            {{-- MESSAGES_PUBLIC End --}}

                        </ul>
                    </li>


                @endcan
                {{-- OCSS_DATA End--}}

                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('global.userManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{--@can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan--}}
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
