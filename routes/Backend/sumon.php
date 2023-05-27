<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'master-setup', 'as' => 'master_setup.', 'namespace' => 'MasterSetup'], function () {
    Route::resource('personal_secretaries','PersonalSecretaryController');
});


Route::group(['prefix' => 'profile-activities', 'as' => 'profile_activities.', 'namespace' => 'ProfileActivities'], function () {
    Route::resource('profiles','ProfileController');
});