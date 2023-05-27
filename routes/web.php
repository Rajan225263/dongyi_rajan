<?php

Route::get('sub-menu/demo', 'Frontend\FrontController@demo');

Route::get('/locale/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
})->name('locale');

Route::get('/cache_clear', function () {
    try {
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
    } catch (\Exception $e) {
        dd($e);
    }
});


// Frontend
// Route::get('/','Frontend\FrontController@home')->name('home');


Route::get('sub-menu/{menu_url}', 'Frontend\FrontController@MenuUrl')->name('menu_url')->where('menu_url', '.*');

Route::get('/', function () {
    return redirect()->route('login');
});
//Reset Password
Route::get('reset/password', 'Backend\PasswordResetController@resetPassword')->name('reset.password');
Route::post('check/email', 'Backend\PasswordResetController@checkEmail')->name('check.email');
Route::get('check/name', 'Backend\PasswordResetController@checkName')->name('check.name');
Route::get('check/code', 'Backend\PasswordResetController@checkCode')->name('check.code');
Route::post('submit/check/code', 'Backend\PasswordResetController@submitCode')->name('submit.check.code');
Route::get('new/password', 'Backend\PasswordResetController@newPassword')->name('new.password');
Route::post('store/new/password', 'Backend\PasswordResetController@newPasswordStore')->name('store.new.password');


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'Backend\HomeController@index')->name('dashboard');

    Route::group(['middleware' => ['permission']], function () {

        Route::prefix('menu')->group(function () {
            Route::get('/view', 'Backend\Menu\MenuController@index')->name('menu');
            Route::get('/add', 'Backend\Menu\MenuController@add')->name('menu.add');
            Route::post('/store', 'Backend\Menu\MenuController@store')->name('menu.store');
            Route::get('/edit/{id}', 'Backend\Menu\MenuController@edit')->name('menu.edit');
            Route::post('/update/{id}', 'Backend\Menu\MenuController@update')->name('menu.update');
            Route::get('/subparent', 'Backend\Menu\MenuController@getSubParent')->name('menu.getajaxsubparent');

            Route::get('/icon', 'Backend\Menu\MenuIconController@index')->name('menu.icon');
            Route::post('icon/store', 'Backend\Menu\MenuIconController@store')->name('menu.icon.store');
            Route::get('icon/edit', 'Backend\Menu\MenuIconController@edit')->name('menu.icon.edit');
            Route::post('icon/update/{id}', 'Backend\Menu\MenuIconController@update')->name('menu.icon.update');
            Route::post('icon/delete', 'Backend\Menu\MenuIconController@delete')->name('menu.icon.delete');
        });

        Route::post('/data/statuschange', 'Backend\DefaultController@statusChange')->name('table.status.change');
        Route::post('/data/delete', 'Backend\DefaultController@delete')->name('table.data.delete');
        Route::get('/sub/menu', 'Backend\DefaultController@SubMenu')->name('table.data.submenu');

        Route::prefix('profile-management')->group(function () {

            //Change Password
            Route::get('change/password', 'Backend\PasswordChangeController@changePassword')->name('profile-management.change.password');
            Route::post('store/password', 'Backend\PasswordChangeController@storePassword')->name('profile-management.store.password');
        });
    });

    // Accounts
    // Crated date: 26-05-2023, Created By : Rajan Bhatta

    Route::group(['prefix' => 'account'], function () {
        Route::get('/accounts', 'MasterSetup\AccountController@index')->name('account.index');
        Route::get('create', 'MasterSetup\AccountController@create')->name('account.create');
        Route::post('create', 'MasterSetup\AccountController@store')->name('account.store');
        Route::get('/edit/{id}', 'MasterSetup\AccountController@edit')->name('account.edit');
        Route::put('/edit/{id}', 'MasterSetup\AccountController@update')->name('account.update');
        Route::get('/delete', 'MasterSetup\AccountController@destroy')->name('account.delete');
    });

    // Transaction
    // Crated date: 26-05-2023, Created By : Rajan Bhatta

    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/transactions', 'MasterSetup\TransactionController@index')->name('transaction.index');
        Route::get('create', 'MasterSetup\TransactionController@create')->name('transaction.create');
        Route::post('create', 'MasterSetup\TransactionController@store')->name('transaction.store');
        Route::get('/edit/{id}', 'MasterSetup\TransactionController@edit')->name('transaction.edit');
        Route::put('/edit/{id}', 'MasterSetup\TransactionController@update')->name('transaction.update');
        Route::get('/delete', 'MasterSetup\TransactionController@destroy')->name('transaction.delete');
    });
});
