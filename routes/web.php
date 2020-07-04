<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth']],
    function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

        Route::resource('permissions', 'PermissionsController');

        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

        Route::resource('roles', 'RolesController');

        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

        Route::resource('users', 'UsersController');

        Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

        Route::resource('products', 'ProductsController');

        /* Moovah Dashboard ---------------------------------------------------- */
        Route::group(['prefix' => 'messages'], function () {

           /* Route::get('/private', function () {
                $msg_type = 'private';
                return view('admin.messages.index', ['msg_type' => $msg_type]);
            });

            Route::get('/public', function () {
                $msg_type = 'public';
                return view('admin.messages.index', ['msg_type' => $msg_type]);
            });
           */

            Route::get('/', "MessageController@getPrivateMessages");
            Route::get('/public', "MessageController@getPublicMessages");
            Route::get('/edit', "MessageController@editMessages");
            Route::get('/view-public', "MessageController@viewPublicMessages");
            Route::post('/post', "MessageController@update");
            Route::get('/create', "MessageController@create");
            Route::post('/broadcast', "MessageController@broadcast");


        });
        /* Moovah Dashboard End ================================================ */


    });
