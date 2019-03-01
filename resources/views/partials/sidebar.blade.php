@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            @can('invoice_access')
            <li>
                <a href="{{ route('admin.invoices.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>@lang('global.invoices.title')</span>
                </a>
            </li>@endcan
            
            @can('project_access')
            <li>
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>@lang('global.projects.title')</span>
                </a>
            </li>@endcan
            
            @can('meeting_access')
            <li>
                <a href="{{ route('admin.meetings.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>@lang('global.meetings.title')</span>
                </a>
            </li>@endcan
            
            @can('provider_access')
            <li>
                <a href="{{ route('admin.providers.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>@lang('global.providers.title')</span>
                </a>
            </li>@endcan
            
            @can('medium_access')
            <li>
                <a href="{{ route('admin.media.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>@lang('global.media.title')</span>
                </a>
            </li>@endcan
            
            @can('invoice_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.invoice-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('budget_access')
                    <li>
                        <a href="{{ route('admin.budgets.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.budgets.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('category_access')
                    <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.categories.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('contingency_access')
                    <li>
                        <a href="{{ route('admin.contingencies.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.contingencies.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('expense_type_access')
                    <li>
                        <a href="{{ route('admin.expense_types.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.expense-types.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('service_type_access')
                    <li>
                        <a href="{{ route('admin.service_types.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.service-types.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('year_access')
                    <li>
                        <a href="{{ route('admin.years.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.years.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('permission_access')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.permissions.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('global.users.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('status_access')
                    <li>
                        <a href="{{ route('admin.statuses.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.statuses.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('message_access')
                    <li>
                        <a href="{{ route('admin.messages.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.messages.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

