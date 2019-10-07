<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Projectstatuses
    Route::apiResource('project-statuses', 'ProjectStatusApiController');

    // Projects
    Route::apiResource('projects', 'ProjectsApiController');

    // Notice
    Route::apiResource('notices','NoticeApiController');

    // Bankaccounts
    Route::apiResource('bank-accounts', 'BankAccountsApiController');

    // Userstatuses
    Route::apiResource('user-statuses', 'UserStatusApiController');

    // Accounttypes
    Route::apiResource('account-types', 'AccountTypeApiController');

    // Expensecategories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Incomecategories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Expensereports
//    Route::apiResource('expense-reports', 'ExpenseReportApiController');
});
