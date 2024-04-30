<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\UserStatus;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/status', function () {
    if (auth()->user()->status === 'pending') {
        return view('pages.status');
    }else{
        return redirect()->route('dashboard');
    }
})->name('status');

Route::get('/dashboard', function () {
    switch (auth()->user()->user_type) {
        case 'employer':
            return redirect()->route('employer.dashboard');
            break;
        case 'student':
           return redirect()->route('user.profile');
            break;
        case 'alumni':
            return redirect()->route('user.profile');
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
        Route::get('/student', function () {
            return view('admin.student');
        })->name('admin.student');
        Route::get('/alumni', function () {
            return view('admin.alumni');
        })->name('admin.alumni');
        Route::get('/employer', function () {
            return view('admin.employer');
        })->name('admin.employer');
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

        Route::get('/job/{id}', function () {
            return view('pages.job-description');
        })->name('user.job-description');

        Route::get('/user-application', function () {
            return view('pages.application');
        })->name('user.application');
        Route::get('/user-application/{id}', function () {
            return view('pages.application-open');
        })->name('user.application-open');
    }
);

Route::prefix('employer')->middleware(UserStatus::class)->group(
    function(){
       Route::get('/profile', function(){
        return view('employer.index');
       })->name('employer.dashboard');
       Route::get('/application', function(){
        return view('employer.application');
       })->name('employer.application');
       Route::get('/application/{id}', function(){
        return view('employer.application-description');
       })->name('employer.application-description');
       Route::get('/hired', function(){
        return view('employer.hired');
       })->name('employer.hired');
    }
);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
