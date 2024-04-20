<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\UserStatus;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    switch (auth()->user()->user_type) {
        case 'employer':
            dd('employer');
            break;
        case 'student':
           return redirect()->route('user.profile');
            break;
        case 'alumni':
            dd('alumni');
            break;

        default:
           return redirect()->route('admin.dashboard');
            break;
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->group(
    function(){
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard');
        Route::get('/user-request', function () {
            return view('admin.request');
        })->name('admin.request');
        Route::get('/work-environment', function () {
            return view('admin.environment');
        })->name('admin.environment');
    }
);

Route::middleware(UserStatus::class)->group(
    function(){
        Route::get('/jobsearch', function () {
            if (UserInformation::where('user_id', auth()->user()->id)->count() == 0) {
                return redirect()->route('user.profile');
            }else{
                return view('pages.jobsearch');
            }
        })->name('welcome');

        Route::get('/user-profile', function () {
            return view('pages.profile');
        })->name('user.profile');
    }
);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
