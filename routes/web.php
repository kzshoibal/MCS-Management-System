<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);
//require_once app_path() . '\config/Constants.php';

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('/test', 'HomeController@test')->name('hometest');

    //    for test route
//    Route::resource('test','TestController');


    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::get('users/banUser', 'UsersController@banUser')->name('users.banUser');
    Route::resource('users', 'UsersController');

    //profile
    Route::resource('profile', 'ProfileController');
//    Route::resource('profile','ProfileController');

    // Auditlogs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Myprofileinformations
//    Route::get('my-profile-informations/changePassword','MyProfileInformationController@showChangePasswordForm');
    Route::resource('my-profile-informations', 'MyProfileInformationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Updateprofileinformations
    Route::resource('update-profile-informations', 'UpdateProfileInformationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Changepasswords
    Route::resource('change-passwords', 'ChangePasswordController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

//    Route::get('/change-password','ChangePasswordController@showChangePasswordForm');
    Route::post('/change-password','ChangePasswordController@changePassword')->name('change-password');


    // Enrolemonthlydeposits
    Route::resource('monthly-deposits', 'MonthlyDepositController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
    Route::resource('monthly-deposits', 'MonthlyDepositController');
    Route::get('enrole-monthly-deposits/all','MonthlyDepositController@getAllMonthlyDepositList')->name('monthly-deposits.listall');
    Route::get('enrole-monthly-deposits/all-pending','MonthlyDepositController@getAllPendingMonthlyDepsitList')->name('monthly-deposits.listpending');
    Route::get('enrole-monthly-deposits/all-approved','MonthlyDepositController@getAllApprovedMonthlyDepositList')->name('monthly-deposits.listapproved');
    Route::get('enrole-monthly-deposits/all-rejected','MonthlyDepositController@getAllRejectedMonthlyDepositList')->name('monthly-deposits.listrejected');
    Route::get('enrole-monthly-deposits/{id}/edit-from-all','MonthlyDepositController@editFromAllList')->name('monthly-deposits.editFromAllList');
    Route::match(['put', 'patch'], 'enrole-monthly-deposits/edit-from-all/{id}','MonthlyDepositController@updateFromAllList')->name('monthly-deposits.updateFromAllList');
    Route::get('enrole-monthly-deposits/{id}/approve','MonthlyDepositController@approveMonthlyDepositRequest')->name('monthly-deposits.approve');
    Route::get('enrole-monthly-deposits/{id}/reject','MonthlyDepositController@rejectMonthlyDepositRequest')->name('monthly-deposits.reject');

    // Deposit on Projects
    Route::resource('project-contributions', 'ProjectDepositController');
    Route::get('project-contributions/all','ProjectDepositController@getAllProjectDepositList')->name('project-contributions.listall');
    Route::get('project-contributions/all-pending','ProjectDepositController@getAllPendingProjectDepsitList')->name('project-contributions.listpending');
    Route::get('project-contributions/all-approved','ProjectDepositController@getAllApprovedProjectDepositList')->name('project-contributions.listapproved');
    Route::get('project-contributions/all-rejected','ProjectDepositController@getAllRejectedProjectDepositList')->name('project-contributions.listrejected');

    // Contributionhistories
    Route::resource('contribution-histories', 'ContributionHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Projectstatuses
    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');
    Route::resource('project-statuses', 'ProjectStatusController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectsController');

    // Bankaccounts
    Route::delete('bank-accounts/destroy', 'BankAccountsController@massDestroy')->name('bank-accounts.massDestroy');
    Route::resource('bank-accounts', 'BankAccountsController');

    // Userstatuses
    Route::delete('user-statuses/destroy', 'UserStatusController@massDestroy')->name('user-statuses.massDestroy');
    Route::resource('user-statuses', 'UserStatusController');

    // Accounttypes
    Route::delete('account-types/destroy', 'AccountTypeController@massDestroy')->name('account-types.massDestroy');
    Route::resource('account-types', 'AccountTypeController');

    // Expensecategories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Incomecategories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expensereports
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    //Notices
    Route::delete('notice/destroy', 'NoticeController@massDestroy')->name('notices.massDestroy');
//    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('notice','NoticeController');

    //Transaction
    Route::resource('transaction','TransactionController');
//    Route::get('transaction','TransactionController@index');



    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');



});


