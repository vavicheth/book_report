<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
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
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/audit-logs*') ? 'menu-open' : '' }} {{ request()->is('admin/departments*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.auditLog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departments.index") }}" class="nav-link {{ request()->is('admin/departments') || request()->is('admin/departments/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-university">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.department.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('patient_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.patients.index") }}" class="nav-link {{ request()->is('admin/patients') || request()->is('admin/patients/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-address-card">

                            </i>
                            <p>
                                <span>{{ trans('cruds.patient.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('emergency_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.emergencies.index") }}" class="nav-link {{ request()->is('admin/emergencies') || request()->is('admin/emergencies/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-ambulance">

                            </i>
                            <p>
                                <span>{{ trans('cruds.emergency.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('ipd_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.ipds.index") }}" class="nav-link {{ request()->is('admin/ipds') || request()->is('admin/ipds/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-bed">

                            </i>
                            <p>
                                <span>{{ trans('cruds.ipd.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('surgery_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.surgeries.index") }}" class="nav-link {{ request()->is('admin/surgeries') || request()->is('admin/surgeries/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cut">

                            </i>
                            <p>
                                <span>{{ trans('cruds.surgery.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

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