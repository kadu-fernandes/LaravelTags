<?php

use App\Http\Controllers\TrackedDirectoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tracked/directory', TrackedDirectoryController::class)
    ->except(['edit', 'update'])
    ->parameters(['directory' => 'trackedDirectory'])
    ->names([
        'index' => 'tracked_directory.index',
        'create' => 'tracked_directory.create',
        'store' => 'tracked_directory.store',
        'show' => 'tracked_directory.show',
        'destroy' => 'tracked_directory.destroy',
    ]);
