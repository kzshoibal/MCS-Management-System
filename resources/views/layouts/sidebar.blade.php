  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto; ">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
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
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ url('employee-management') }}"><i class="fa fa-link"></i> <span>Employee Management</span></a></li>
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
                              <a href="{{ route("admin.my-profile-informations.index") }}">
                                  <i class="fa-fw far fa-user-circle">

                                  </i>
                                  <span>{{ trans('cruds.myProfileInformation.title') }}</span>
                              </a>
                          </li>
                      @endcan
                      @can('update_profile_information_access')
                          <li class="{{ request()->is('admin/update-profile-informations') || request()->is('admin/update-profile-informations/*') ? 'active' : '' }}">
                              <a href="{{ route("admin.update-profile-informations.index") }}">
                                  <i class="fa-fw fas fa-user-edit">

                                  </i>
                                  <span>{{ trans('cruds.updateProfileInformation.title') }}</span>
                              </a>
                          </li>
                      @endcan
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
                          <li class="{{ request()->is('admin/enrole-monthly-deposits') || request()->is('admin/enrole-monthly-deposits/*') ? 'active' : '' }}">
                              <a href="{{ route("admin.enrole-monthly-deposits.index") }}">
                                  <i class="fa-fw far fa-credit-card">

                                  </i>
                                  <span>{{ trans('cruds.enroleMonthlyDeposit.title') }}</span>
                              </a>
                          </li>
                      @endcan
                      @can('contribution_history_access')
                          <li class="{{ request()->is('admin/contribution-histories') || request()->is('admin/contribution-histories/*') ? 'active' : '' }}">
                              <a href="{{ route("admin.contribution-histories.index") }}">
                                  <i class="fa-fw fas fa-money-bill">

                                  </i>
                                  <span>{{ trans('cruds.contributionHistory.title') }}</span>
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
{{--        <li><a href="{{ route('user-management.index') }}"><i class="fa fa-link"></i> <span>User management</span></a></li>--}}
        <li><a href="{{ route("admin.roles.index") }}"><i class="fa fa-link"></i> <span>User management</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
