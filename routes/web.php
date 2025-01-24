<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TrackedDirectoryController;
use App\Http\Controllers\TrackedFileController;
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
    ])
    ->whereNumber('trackedDirectory');

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
    ])
    ->whereNumber('trackedTag');

Route::get('/tracked/file', [TrackedFileController::class, 'index'])->name('tracked_file.index');

Route::get('/tracked/file/directory/{trackedDirectory}', [TrackedFileController::class, 'index'])
    ->name('tracked_file.index_directory')
    ->whereNumber('trackedDirectory');

Route::resource('tracked/file', TrackedFileController::class)
    ->except(['index', 'create'])
    ->parameters(['file' => 'trackedFile'])
    ->names([
        'index' => 'tracked_file.index',
        'store' => 'tracked_file.store',
        'show' => 'tracked_file.show',
        'update' => 'tracked_file.update',
        'destroy' => 'tracked_file.destroy',
        'edit' => 'tracked_file.edit'
    ])
    ->whereNumber('trackedFile');

Route::get('/tracked/file/directory/{trackedDirectory}/create', [TrackedFileController::class, 'create'])
    ->name('tracked_file.create')
    ->whereNumber('trackedDirectory');

Route::get('/tracked/file/{trackedFile}/tag/{trackedTag}/add', [TrackedFileController::class, 'addTag'])
    ->name('tracked_file.add_tag')
    ->whereNumber('trackedFile')
    ->whereNumber('trackedTag');

Route::get('/tracked/file/{trackedFile}/tag/{trackedTag}/remove', [TrackedFileController::class, 'removeTag'])
    ->name('tracked_file.remove_tag')
    ->whereNumber('trackedFile')
    ->whereNumber('trackedTag');

Route::get('/tracked/file/tag/{trackedFile}/handle', [TrackedFileController::class, 'handleTags'])
    ->name('file_tag.index')
    ->whereNumber('trackedFile');
