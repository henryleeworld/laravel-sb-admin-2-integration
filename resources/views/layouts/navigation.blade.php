<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>
    <hr class="sidebar-divider" />
    @can('users_manage')
    <li class="nav-item {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="padding-top: inherit;">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ trans('cruds.user_management.title') }}</span>
        </a>
        <div id="collapseTwo" class="collapse {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">{{ trans('cruds.permission.title') }}</a>
                <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">{{ trans('cruds.role.title') }}</a>
                <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">{{ trans('cruds.user.title') }}</a>
            </div>
        </div>
    </li>
    <div class="text-center d-none d-md-inline pt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    @endcan
</ul>
