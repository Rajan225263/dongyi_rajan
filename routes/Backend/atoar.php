<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'notice-management', 'as' => 'notice_management.', 'namespace' => 'NoticeManagement'], function () {
    Route::resource('notices','NoticeController');
});
