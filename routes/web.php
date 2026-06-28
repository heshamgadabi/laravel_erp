<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\OfficeController;
use App\Models\Flight;
use App\Http\Controllers\BillController as ControllersBillController;
use App\Http\Controllers\CoursesController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('front', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/cart', function () {
    return view('cart');
});


Route::get('/hesham/{name?}',function ($name = NULL){

    return 'Hamza '.$name;

});

Route::get('/users/show/{id?}',[UserController::class,'show']);

Route::get('/users/login',[UserController::class,'login_page']);


Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'users';
    });


    Route::get('/news/{id?}', function ($id = 1) {
        return 'news '.$id;
    });


     


});


Route::get('/flights', [FlightsController::class,'index']);

Route::get('/create/flight', [FlightsController::class,'create'])->name('create_flight');

Route::post('/save/flight', [FlightsController::class,'save'])->name('save_flight');

Route::get('/offices', [OfficeController::class,'index']);

Route::get('/create/office', [OfficeController::class,'create'])->name('create_office');

Route::post('/save/office', [OfficeController::class,'store'])->name('save_office');

Route::get('/office/{id?}/edit',[OfficeController::class,'edit'])->name('edit_office');

Route::post('/office/{id?}/edit/save',[OfficeController::class,'edit_office_save'])->name('save_office_edit');

Route::get('/office/{id?}/delete',[OfficeController::class,'delete'])->name('delete_office');

Route::get('/office/final/{id?}/delete',[OfficeController::class,'final_delete'])->name('final_delete_office');

Route::resource('bill', ControllersBillController::class);


Route::get('courses', [CoursesController::class,'index'])->name('courses.index')->middleware(['auth','check.user']);

Route::get('courses/create', [CoursesController::class,'create'])->name('courses.create')->middleware('auth');

Route::post('courses/store', [CoursesController::class,'store'])->name('courses.store');

Route::get('courses/{id}/edit', [CoursesController::class,'edit'])->name('courses.edit');

Route::put('courses/{id}/update', [CoursesController::class,'update'])->name('courses.update');

Route::delete('courses/{id}/delete', [CoursesController::class,'destroy'])->name('courses.destroy');

Route::get('courses/{id}/delete', [CoursesController::class,'destroy'])->name('courses.delete');




require __DIR__.'/auth.php';
