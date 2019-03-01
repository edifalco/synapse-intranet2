<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('invoices', 'Admin\InvoicesController');
    Route::post('invoices_mass_destroy', ['uses' => 'Admin\InvoicesController@massDestroy', 'as' => 'invoices.mass_destroy']);
    Route::post('invoices_restore/{id}', ['uses' => 'Admin\InvoicesController@restore', 'as' => 'invoices.restore']);
    Route::delete('invoices_perma_del/{id}', ['uses' => 'Admin\InvoicesController@perma_del', 'as' => 'invoices.perma_del']);
    Route::resource('projects', 'Admin\ProjectsController');
    Route::post('projects_mass_destroy', ['uses' => 'Admin\ProjectsController@massDestroy', 'as' => 'projects.mass_destroy']);
    Route::post('projects_restore/{id}', ['uses' => 'Admin\ProjectsController@restore', 'as' => 'projects.restore']);
    Route::delete('projects_perma_del/{id}', ['uses' => 'Admin\ProjectsController@perma_del', 'as' => 'projects.perma_del']);
    Route::resource('meetings', 'Admin\MeetingsController');
    Route::post('meetings_mass_destroy', ['uses' => 'Admin\MeetingsController@massDestroy', 'as' => 'meetings.mass_destroy']);
    Route::post('meetings_restore/{id}', ['uses' => 'Admin\MeetingsController@restore', 'as' => 'meetings.restore']);
    Route::delete('meetings_perma_del/{id}', ['uses' => 'Admin\MeetingsController@perma_del', 'as' => 'meetings.perma_del']);
    Route::resource('providers', 'Admin\ProvidersController');
    Route::post('providers_mass_destroy', ['uses' => 'Admin\ProvidersController@massDestroy', 'as' => 'providers.mass_destroy']);
    Route::post('providers_restore/{id}', ['uses' => 'Admin\ProvidersController@restore', 'as' => 'providers.restore']);
    Route::delete('providers_perma_del/{id}', ['uses' => 'Admin\ProvidersController@perma_del', 'as' => 'providers.perma_del']);
    Route::resource('media', 'Admin\MediaController');
    Route::post('media_mass_destroy', ['uses' => 'Admin\MediaController@massDestroy', 'as' => 'media.mass_destroy']);
    Route::resource('budgets', 'Admin\BudgetsController');
    Route::post('budgets_mass_destroy', ['uses' => 'Admin\BudgetsController@massDestroy', 'as' => 'budgets.mass_destroy']);
    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoriesController@massDestroy', 'as' => 'categories.mass_destroy']);
    Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoriesController@restore', 'as' => 'categories.restore']);
    Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoriesController@perma_del', 'as' => 'categories.perma_del']);
    Route::resource('contingencies', 'Admin\ContingenciesController');
    Route::post('contingencies_mass_destroy', ['uses' => 'Admin\ContingenciesController@massDestroy', 'as' => 'contingencies.mass_destroy']);
    Route::post('contingencies_restore/{id}', ['uses' => 'Admin\ContingenciesController@restore', 'as' => 'contingencies.restore']);
    Route::delete('contingencies_perma_del/{id}', ['uses' => 'Admin\ContingenciesController@perma_del', 'as' => 'contingencies.perma_del']);
    Route::resource('expense_types', 'Admin\ExpenseTypesController');
    Route::post('expense_types_mass_destroy', ['uses' => 'Admin\ExpenseTypesController@massDestroy', 'as' => 'expense_types.mass_destroy']);
    Route::post('expense_types_restore/{id}', ['uses' => 'Admin\ExpenseTypesController@restore', 'as' => 'expense_types.restore']);
    Route::delete('expense_types_perma_del/{id}', ['uses' => 'Admin\ExpenseTypesController@perma_del', 'as' => 'expense_types.perma_del']);
    Route::resource('service_types', 'Admin\ServiceTypesController');
    Route::post('service_types_mass_destroy', ['uses' => 'Admin\ServiceTypesController@massDestroy', 'as' => 'service_types.mass_destroy']);
    Route::post('service_types_restore/{id}', ['uses' => 'Admin\ServiceTypesController@restore', 'as' => 'service_types.restore']);
    Route::delete('service_types_perma_del/{id}', ['uses' => 'Admin\ServiceTypesController@perma_del', 'as' => 'service_types.perma_del']);
    Route::resource('years', 'Admin\YearsController');
    Route::post('years_mass_destroy', ['uses' => 'Admin\YearsController@massDestroy', 'as' => 'years.mass_destroy']);
    Route::post('years_restore/{id}', ['uses' => 'Admin\YearsController@restore', 'as' => 'years.restore']);
    Route::delete('years_perma_del/{id}', ['uses' => 'Admin\YearsController@perma_del', 'as' => 'years.perma_del']);
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('statuses', 'Admin\StatusesController');
    Route::post('statuses_mass_destroy', ['uses' => 'Admin\StatusesController@massDestroy', 'as' => 'statuses.mass_destroy']);
    Route::post('statuses_restore/{id}', ['uses' => 'Admin\StatusesController@restore', 'as' => 'statuses.restore']);
    Route::delete('statuses_perma_del/{id}', ['uses' => 'Admin\StatusesController@perma_del', 'as' => 'statuses.perma_del']);
    Route::resource('messages', 'Admin\MessagesController');
    Route::post('messages_mass_destroy', ['uses' => 'Admin\MessagesController@massDestroy', 'as' => 'messages.mass_destroy']);
    Route::post('messages_restore/{id}', ['uses' => 'Admin\MessagesController@restore', 'as' => 'messages.restore']);
    Route::delete('messages_perma_del/{id}', ['uses' => 'Admin\MessagesController@perma_del', 'as' => 'messages.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');



 
});
