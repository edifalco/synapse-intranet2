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
            
            @can('budget_access')
            <li>
                <a href="{{ route('admin.budgets.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.budgets.title')</span>
                </a>
            </li>@endcan
            
            @can('provider_access')
            <li>
                <a href="{{ route('admin.providers.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>@lang('global.providers.title')</span>
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
            
            @can('expense_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>@lang('global.expense-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('expense_category_access')
                    <li>
                        <a href="{{ route('admin.expense_categories.index') }}">
                            <i class="fa fa-list"></i>
                            <span>@lang('global.expense-category.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('income_category_access')
                    <li>
                        <a href="{{ route('admin.income_categories.index') }}">
                            <i class="fa fa-list"></i>
                            <span>@lang('global.income-category.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('income_access')
                    <li>
                        <a href="{{ route('admin.incomes.index') }}">
                            <i class="fa fa-arrow-circle-right"></i>
                            <span>@lang('global.income.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('expense_access')
                    <li>
                        <a href="{{ route('admin.expenses.index') }}">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>@lang('global.expense.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('monthly_report_access')
                    <li>
                        <a href="{{ route('admin.monthly_reports.index') }}">
                            <i class="fa fa-line-chart"></i>
                            <span>@lang('global.monthly-report.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('time_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-clock-o"></i>
                    <span>@lang('global.time-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('time_work_type_access')
                    <li>
                        <a href="{{ route('admin.time_work_types.index') }}">
                            <i class="fa fa-th"></i>
                            <span>@lang('global.time-work-types.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('time_project_access')
                    <li>
                        <a href="{{ route('admin.time_projects.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.time-projects.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('time_entry_access')
                    <li>
                        <a href="{{ route('admin.time_entries.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.time-entries.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('time_report_access')
                    <li>
                        <a href="{{ route('admin.time_reports.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.time-reports.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('task_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>@lang('global.task-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('task_access')
                    <li>
                        <a href="{{ route('admin.tasks.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.tasks.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('task_status_access')
                    <li>
                        <a href="{{ route('admin.task_statuses.index') }}">
                            <i class="fa fa-server"></i>
                            <span>@lang('global.task-statuses.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('task_tag_access')
                    <li>
                        <a href="{{ route('admin.task_tags.index') }}">
                            <i class="fa fa-server"></i>
                            <span>@lang('global.task-tags.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('task_calendar_access')
                    <li>
                        <a href="{{ route('admin.task_calendars.index') }}">
                            <i class="fa fa-calendar"></i>
                            <span>@lang('global.task-calendar.title')</span>
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
            
            @can('content_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>@lang('global.content-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('content_category_access')
                    <li>
                        <a href="{{ route('admin.content_categories.index') }}">
                            <i class="fa fa-folder"></i>
                            <span>@lang('global.content-categories.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('content_tag_access')
                    <li>
                        <a href="{{ route('admin.content_tags.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>@lang('global.content-tags.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('content_page_access')
                    <li>
                        <a href="{{ route('admin.content_pages.index') }}">
                            <i class="fa fa-file-o"></i>
                            <span>@lang('global.content-pages.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('client_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>@lang('global.client-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('client_access')
                    <li>
                        <a href="{{ route('admin.clients.index') }}">
                            <i class="fa fa-user-plus"></i>
                            <span>@lang('global.clients.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('client_project_access')
                    <li>
                        <a href="{{ route('admin.client_projects.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.client-projects.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('client_management_setting_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.client-management-settings.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('client_currency_access')
                    <li>
                        <a href="{{ route('admin.client_currencies.index') }}">
                            <i class="fa fa-money"></i>
                            <span>@lang('global.client-currencies.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('client_transaction_type_access')
                    <li>
                        <a href="{{ route('admin.client_transaction_types.index') }}">
                            <i class="fa fa-exchange"></i>
                            <span>@lang('global.client-transaction-types.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('client_income_source_access')
                    <li>
                        <a href="{{ route('admin.client_income_sources.index') }}">
                            <i class="fa fa-database"></i>
                            <span>@lang('global.client-income-sources.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('client_status_access')
                    <li>
                        <a href="{{ route('admin.client_statuses.index') }}">
                            <i class="fa fa-server"></i>
                            <span>@lang('global.client-statuses.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('client_project_status_access')
                    <li>
                        <a href="{{ route('admin.client_project_statuses.index') }}">
                            <i class="fa fa-server"></i>
                            <span>@lang('global.client-project-statuses.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('basic_crm_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>@lang('global.basic-crm.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('crm_status_access')
                    <li>
                        <a href="{{ route('admin.crm_statuses.index') }}">
                            <i class="fa fa-folder"></i>
                            <span>@lang('global.crm-statuses.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('crm_customer_access')
                    <li>
                        <a href="{{ route('admin.crm_customers.index') }}">
                            <i class="fa fa-user-plus"></i>
                            <span>@lang('global.crm-customers.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('crm_note_access')
                    <li>
                        <a href="{{ route('admin.crm_notes.index') }}">
                            <i class="fa fa-building-o"></i>
                            <span>@lang('global.crm-notes.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('crm_document_access')
                    <li>
                        <a href="{{ route('admin.crm_documents.index') }}">
                            <i class="fa fa-file"></i>
                            <span>@lang('global.crm-documents.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('contact_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-phone-square"></i>
                    <span>@lang('global.contact-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('contact_company_access')
                    <li>
                        <a href="{{ route('admin.contact_companies.index') }}">
                            <i class="fa fa-building-o"></i>
                            <span>@lang('global.contact-companies.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('contact_access')
                    <li>
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fa fa-user-plus"></i>
                            <span>@lang('global.contacts.title')</span>
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
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('global.user-actions.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            

            

            
            @php ($unread = App\MessengerTopic::countUnread())
            <li class="{{ $request->segment(2) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
                <a href="{{ route('admin.messenger.index') }}">
                    <i class="fa fa-envelope"></i>

                    <span>Messages</span>
                    @if($unread > 0)
                        {{ ($unread > 0 ? '('.$unread.')' : '') }}
                    @endif
                </a>
            </li>
            <style>
                .page-sidebar-menu .unread * {
                    font-weight:bold !important;
                }
            </style>



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

