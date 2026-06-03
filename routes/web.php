<?php

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


Route::get('courses', [CoursesController::class,'index'])->name('courses.index');
