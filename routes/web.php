<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::redirect('/login', '/admin/login')->name('login');

Route::get('/preview', function () {
    abort_unless($token = request()->get('token'), 404);

    abort_unless($previewData = cache("preview-{$token}"), 404);

    return $previewData;
});
