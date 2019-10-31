<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {

});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::get('/admin/rooms',                                  'Admin\RoomsController@index');
    Route::get('/admin/rooms/create',                           'Admin\RoomsController@create');
    Route::post('/admin/rooms',                                 'Admin\RoomsController@store');
    Route::get('/admin/rooms/{room}/edit',                      'Admin\RoomsController@edit')->name('admin/rooms/edit');
    Route::post('/admin/rooms/bulk-destroy',                    'Admin\RoomsController@bulkDestroy')->name('admin/rooms/bulk-destroy');
    Route::post('/admin/rooms/{room}',                          'Admin\RoomsController@update')->name('admin/rooms/update');
    Route::delete('/admin/rooms/{room}',                        'Admin\RoomsController@destroy')->name('admin/rooms/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::get('/admin/items',                                  'Admin\ItemsController@index');
    Route::get('/admin/items/create',                           'Admin\ItemsController@create');
    Route::post('/admin/items',                                 'Admin\ItemsController@store');
    Route::get('/admin/items/{item}/edit',                      'Admin\ItemsController@edit')->name('admin/items/edit');
    Route::post('/admin/items/bulk-destroy',                    'Admin\ItemsController@bulkDestroy')->name('admin/items/bulk-destroy');
    Route::post('/admin/items/{item}',                          'Admin\ItemsController@update')->name('admin/items/update');
    Route::delete('/admin/items/{item}',                        'Admin\ItemsController@destroy')->name('admin/items/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::get('/admin/people',                                 'Admin\PeopleController@index');
    Route::get('/admin/people/create',                          'Admin\PeopleController@create');
    Route::post('/admin/people',                                'Admin\PeopleController@store');
    Route::get('/admin/people/{person}/edit',                   'Admin\PeopleController@edit')->name('admin/people/edit');
    Route::post('/admin/people/bulk-destroy',                   'Admin\PeopleController@bulkDestroy')->name('admin/people/bulk-destroy');
    Route::post('/admin/people/{person}',                       'Admin\PeopleController@update')->name('admin/people/update');
    Route::delete('/admin/people/{person}',                     'Admin\PeopleController@destroy')->name('admin/people/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::get('/admin/doors',                                  'Admin\DoorsController@index');
    Route::get('/admin/doors/create',                           'Admin\DoorsController@create');
    Route::post('/admin/doors',                                 'Admin\DoorsController@store');
    Route::get('/admin/doors/{door}/edit',                      'Admin\DoorsController@edit')->name('admin/doors/edit');
    Route::post('/admin/doors/bulk-destroy',                    'Admin\DoorsController@bulkDestroy')->name('admin/doors/bulk-destroy');
    Route::post('/admin/doors/{door}',                          'Admin\DoorsController@update')->name('admin/doors/update');
    Route::delete('/admin/doors/{door}',                        'Admin\DoorsController@destroy')->name('admin/doors/destroy');
});

