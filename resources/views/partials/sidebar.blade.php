@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <select class="searchable-field form-control"></select>
            </li>

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/calendar')}}">
                  <i class="fa fa-calendar"></i>
                  <span class="title">
                    Calendar
                  </span>
                </a>
            </li>
        
            @can('expense_access')
            <li>
                <a href="{{ route('admin.expenses.index') }}">
                    <i class="fa fa-money"></i>
                    <span>@lang('global.expenses.title')</span>
                </a>
            </li>@endcan
            
            @can('project_access')
            <li>
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span>@lang('global.projects.title')</span>
                </a>
            </li>@endcan
            
            @can('meeting_access')
            <li>
                <a href="{{ route('admin.meetings.index') }}">
                    <i class="fa fa-clock-o"></i>
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
            
            @can('budget_access')
            <li>
                <a href="{{ route('admin.budgets.index') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>@lang('global.budgets.title')</span>
                </a>
            </li>@endcan
            
            @can('invoice_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>@lang('global.invoice-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
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
            
            @can('faq_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-question"></i>
                    <span>@lang('global.faq-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('faq_category_access')
                    <li>
                        <a href="{{ route('admin.faq_categories.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.faq-categories.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('faq_question_access')
                    <li>
                        <a href="{{ route('admin.faq_questions.index') }}">
                            <i class="fa fa-question"></i>
                            <span>@lang('global.faq-questions.title')</span>
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
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('global.users.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('permission_access')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.permissions.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('status_access')
                    <li>
                        <a href="{{ route('admin.statuses.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.statuses.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('global.user-actions.title')</span>
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
            

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-line-chart"></i>
                    <span class="title">Generated Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li class="{{ $request->is('/reports/monthly-expenses') }}">
                        <a href="{{ url('/admin/reports/monthly-expenses') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Monthly Expenses</span>
                        </a>
                    </li>
                </ul>
            </li>

            



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

