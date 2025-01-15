<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TrackedDirectoryController;
use App\Http\Controllers\TrackedTagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::resource('tracked/directory', TrackedDirectoryController::class)
    ->except(['edit', 'update'])
    ->parameters(['directory' => 'trackedDirectory'])
    ->names([
        'create' => 'tracked_directory.create',
        'destroy' => 'tracked_directory.destroy',
        'index' => 'tracked_directory.index',
        'show' => 'tracked_directory.show',
        'store' => 'tracked_directory.store',
    ]);

Route::resource('tracked/tag', TrackedTagController::class)
    ->parameters(['tag' => 'trackedTag'])
    ->names([
        'create' => 'tracked_tag.create',
        'destroy' => 'tracked_tag.destroy',
        'edit' => 'tracked_tag.edit',
        'index' => 'tracked_tag.index',
        'show' => 'tracked_tag.show',
        'store' => 'tracked_tag.store',
        'update' => 'tracked_tag.update',
    ]);
