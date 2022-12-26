<?php

use App\Http\Controllers\CalculateController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UpdateEnvController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

// Route::get('/', function () {
//     redirect('home');
// });

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

// Route::get('about', function(){
//     return view('about_page');
// })->name('about'); 

// Route::view("about", "about_page");

// Route::get('/', [StudentController::class, 'index'])->name('student.index');
// Route::get('/home', [StudentController::class, 'home'])->name('student.home');
// Route::get('/about', [StudentController::class, 'about'])->name('student.about');
// Route::get('/profile/{username}/{age}', [StudentController::class, 'profile'])->name('student.profile');

// Route::get('/check_price', function(){
//     return view('middleware.home');
// })->middleware('price')->name('check_price');

// Route::get('/contact', function(){
//     return view('student.contact');
// })->name('contact');

// Route::group(['prefix' => 'location'], function(){
//     Route::get('city', function(){
//         echo "jakarta";
//     })->name('location.city');
//     Route::get('country', function(){
//         echo "indonesia";
//     })->name('location.country');
//     Route::get('zip', function(){
//         echo "10000";
//     })->name('location.zip');
// });

// Route::middleware(['location'])->prefix('location')->group(function(){
//     Route::name('location.')->group(function(){
//         Route::get('city', function(){
//             echo "jakarta";
//         })->name('city');
//         Route::get('country', function(){
//             echo "indonesia";
//         })->name('country');
//         Route::get('zip', function(){
//             echo "10000";
//         })->name('zip');
//     });
// });
Route::get('/', function () {
    return view('crud.home');
});
// student 
Route::prefix('student')->group(function() {
    Route::name('student.')->group(function(){
        Route::get('/', [StudentController::class, 'index'])->name('index');
        // Route::get('/add', [StudentController::class, 'add'])->name('add');
        Route::post('/add/sumbit', [StudentController::class, 'store'])->name('store');
        Route::get('/view/{id}', [StudentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('delete');

        Route::get('/trashed/all', [StudentController::class, 'trashed'])->name('trashed');
        Route::get('/trashed/view/{id}', [StudentController::class, 'showTrashed'])->name('show-trashed');
        Route::get('/trashed/restore/{id}', [StudentController::class, 'restore'])->name('restore');
        Route::get('/force-delete/{id}', [StudentController::class, 'forceDelete'])->name('force-delete');
    });
});

Route::prefix('student/phone')->name('phone.')->group(function(){
    Route::post('/{id}/store', [PhoneController::class, 'store'])->name('store');
    Route::get('/{id}/delete', [PhoneController::class, 'delete'])->name('delete');
    Route::get('/{id}/restore', [PhoneController::class, 'restore'])->name('restore');
    Route::get('/force-delete/{id}', [PhoneController::class, 'forceDelete'])->name('force-delete');
});

Route::prefix('env')->name('env.')->group(function(){
    Route::get('/', [UpdateEnvController::class, 'edit'])->name('edit');
    Route::post('update', [UpdateEnvController::class, 'update'])->name('update');
});
Route::get('/check/{mark}', [CalculateController::class, 'get_result'])->name('check');