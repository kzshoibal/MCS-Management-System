<aside class="main-sidebar">
    <section class="sidebar" style="height: auto; width: auto;">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(Auth::user()->profile->profile_image) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <h3></h3>

            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard')}}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">
                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('profile_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-user-alt">

                        </i>
                        <span>{{ trans('cruds.profileManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('my_profile_information_access')
                            <li class="{{ request()->is('admin/my-profile-informations') || request()->is('admin/my-profile-informations/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.profile.index") }}">
                                    <i class="fa-fw far fa-user-circle">

                                    </i>
                                    <span>{{ trans('cruds.myProfileInformation.title') }}</span>
                                </a>
                            </li>
                        @endcan
{{--                        @can('update_profile_information_access')--}}
{{--                            <li class="{{ request()->is('admin/update-profile-informations') || request()->is('admin/update-profile-informations/*') ? 'active' : '' }}">--}}
{{--                                <a href="{{ route("admin.update-profile-informations.index") }}">--}}
{{--                                    <i class="fa-fw fas fa-user-edit">--}}

{{--                                    </i>--}}
{{--                                    <span>{{ trans('cruds.updateProfileInformation.title') }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
                        @can('change_password_access')
                            <li class="{{ request()->is('admin/change-passwords') || request()->is('admin/change-passwords/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.change-passwords.index") }}">
                                    <i class="fa-fw fas fa-key">

                                    </i>
                                    <span>{{ trans('cruds.changePassword.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('financial_contribution_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-check">

                        </i>
                        <span>{{ trans('cruds.financialContribution.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('enrole_monthly_deposit_access')
                            <li class="{{ request()->is('admin/monthly-deposits') || request()->is('admin/monthly-deposits/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.monthly-deposits.index") }}">
                                    <i class="fa-fw far fa-credit-card">

                                    </i>
                                    <span>{{ trans('cruds.monthlyDeposit.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('project_contributions_access')
                                <li class="{{ request()->is('admin/project-contributions') || request()->is('admin/project-contributions/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.project-contributions.index") }}">
                                        <i class="fa-fw far fa-credit-card">

                                        </i>
                                        <span>{{ 'Project Contributions' }}</span>
                                    </a>
                                </li>
                            @endcan
{{--                        @can('contribution_history_access')--}}
{{--                            <li class="{{ request()->is('admin/contribution-histories') || request()->is('admin/contribution-histories/*') ? 'active' : '' }}">--}}
{{--                                <a href="{{ route("admin.contribution-histories.index") }}">--}}
{{--                                    <i class="fa-fw fas fa-money-bill">--}}

{{--                                    </i>--}}
{{--                                    <span>{{ trans('cruds.contributionHistory.title') }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
                    </ul>
                </li>
            @endcan
            @can('financial_manangement_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-check">

                        </i>
                        <span>{{ trans('Financial Management ') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('financial_manangement_access')
                            <li class="{{ request()->is('admin/enrole-monthly-deposits/all-pending') || request()->is('admin/enrole-monthly-deposits/all-pending/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.monthly-deposits.listpending") }}">
                                    <i class="fa-fw far fa-credit-card">

                                    </i>
                                    <span>{{ 'Monthly Deposit Pending Request' }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('financial_manangement_access')
                            <li class="{{ request()->is('admin/enrole-monthly-deposits/all-approved') || request()->is('admin/enrole-monthly-deposits/all-pending/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.monthly-deposits.listapproved") }}">
                                    <i class="fa-fw far fa-credit-card">

                                    </i>
                                    <span>{{ "Monthly Deposit Approved Request" }}</span>
                                </a>
                            </li>
                        @endcan
                            @can('financial_manangement_access')
                                <li class="{{ request()->is('admin/enrole-monthly-deposits/all-rejected') || request()->is('admin/enrole-monthly-deposits/all-rejected/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.monthly-deposits.listrejected") }}">
                                        <i class="fa-fw far fa-credit-card">

                                        </i>
                                        <span>{{ "Monthly Deposit Rejected Request" }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('financial_manangement_access')
                                <li class="{{ request()->is('admin/enrole-monthly-deposits/all') || request()->is('admin/enrole-monthly-deposits/all/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.monthly-deposits.listall") }}">
                                        <i class="fa-fw far fa-credit-card">

                                        </i>
                                        <span>{{ "All Monthly Deposit List" }}</span>
                                    </a>
                                </li>
                            @endcan


                        @can('financial_manangement_access')
                                <li class="{{ request()->is('admin/monthly-deposits') || request()->is('admin/monthly-deposits/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.monthly-deposits.index") }}">
                                        <i class="fa-fw far fa-credit-card">

                                        </i>
                                        <span>{{ 'Project Deposit Pending Request' }}</span>
                                    </a>
                                </li>
                            @endcan
                        @can('financial_manangement_access')
                                <li class="{{ request()->is('admin/monthly-deposits') || request()->is('admin/monthly-deposits/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.monthly-deposits.listall") }}">
                                        <i class="fa-fw far fa-credit-card">

                                        </i>
                                        <span>{{ "Project Deposit Approved Request" }}</span>
                                    </a>
                                </li>
                            @endcan
                        @can('financial_manangement_access')
                                <li class="{{ request()->is('admin/contribution-histories') || request()->is('admin/contribution-histories/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.contribution-histories.index") }}">
                                        <i class="fa-fw fas fa-money-bill">

                                        </i>
                                        <span>{{ 'All Project Deposit List' }}</span>
                                    </a>
                                </li>
                            @endcan
                    </ul>
                </li>
            @endcan
            @can('setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-wrench">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('project_status_access')
                            <li class="{{ request()->is('admin/project-statuses') || request()->is('admin/project-statuses/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.project-statuses.index") }}">
                                    <i class="fa-fw fab fa-steam">

                                    </i>
                                    <span>{{ trans('cruds.projectStatus.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_status_access')
                            <li class="{{ request()->is('admin/user-statuses') || request()->is('admin/user-statuses/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.user-statuses.index") }}">
                                    <i class="fa-fw far fa-user-circle">

                                    </i>
                                    <span>{{ trans('cruds.userStatus.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('account_type_access')
                            <li class="{{ request()->is('admin/account-types') || request()->is('admin/account-types/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.account-types.index") }}">
                                    <i class="fa-fw fab fa-first-order-alt">

                                    </i>
                                    <span>{{ trans('cruds.accountType.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('projects_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-hotel">

                        </i>
                        <span>{{ trans('cruds.projectsManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('project_access')
                            <li class="{{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.projects.index") }}">
                                    <i class="fa-fw fas fa-archway">

                                    </i>
                                    <span>{{ trans('cruds.project.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('notice_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-bill">

                        </i>
                        <span>{{ trans('cruds.noticeManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('notice_access')
                            <li class="{{ request()->is('admin/notice') || request()->is('admin/notice/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.notice.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.notice.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan


            @can('accouns_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-university">

                        </i>
                        <span>{{ trans('cruds.accounsManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('bank_account_access')
                            <li class="{{ request()->is('admin/bank-accounts') || request()->is('admin/bank-accounts/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.bank-accounts.index") }}">
                                    <i class="fa-fw fas fa-money-check">

                                    </i>
                                    <span>{{ trans('cruds.bankAccount.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('expense_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-bill">

                        </i>
                        <span>{{ trans('cruds.expenseManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('expense_category_access')
                            <li class="{{ request()->is('admin/expense-categories') || request()->is('admin/expense-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.expense-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.expenseCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('income_category_access')
                            <li class="{{ request()->is('admin/income-categories') || request()->is('admin/income-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.income-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.incomeCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('expense_access')
                            <li class="{{ request()->is('admin/expenses') || request()->is('admin/expenses/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.expenses.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.expense.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('income_access')
                            <li class="{{ request()->is('admin/incomes') || request()->is('admin/incomes/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.incomes.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.income.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('expense_report_access')
                            <li class="{{ request()->is('admin/expense-reports') || request()->is('admin/expense-reports/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.expense-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.expenseReport.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

{{--            @can('notice_management_access')--}}
{{--                <li class="treeview">--}}
{{--                    <a href="#">--}}
{{--                        <i class="fa-fw fas fa-money-bill">--}}

{{--                        </i>--}}
{{--                        <span>{{ trans('cruds.noticeManagement.title') }}</span>--}}
{{--                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>--}}
{{--                    </a>--}}
{{--                    <ul class="treeview-menu">--}}
{{--                        @can('notice_category_access')--}}
{{--                            <li class="{{ request()->is('admin/notice-categories') || request()->is('admin/notice-categories/*') ? 'active' : '' }}">--}}
{{--                                <a href="{{ route("admin.notice.index") }}">--}}
{{--                                    <i class="fa-fw fas fa-list">--}}

{{--                                    </i>--}}
{{--                                    <span>{{ trans('cruds.notice.title') }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endcan--}}

            @php($unread = \App\QaTopic::unreadCount())
                <li class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>
