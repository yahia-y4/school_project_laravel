<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ClassroomsController;
 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return redirect('/dashboard/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // -------classrooms routes------
    Route::get('/dashboard/classrooms',[ClassroomsController::class,'index'])->name('classrooms');
    Route::post('/dashboard/classrooms',[ClassroomsController::class,'store']);
    Route::get('/dashboard/classrooms/one/{id}',[ClassroomsController::class,'showClassInfo']);
    Route::get('/dashboard/classrooms/delete/{id}',[ClassroomsController::class,'delete'])->name("deleteClassroom");
    Route::post('/dashboard/classrooms/edit/{id}',[ClassroomsController::class,'edit'])->name("editClassroom");
    //-------------------------------


    // -------students routes------
    Route::get('/dashboard/students',[StudentController::class,'index'])->name('students');
    Route::post('/dashboard/students',[StudentController::class,'store']);
    Route::get('/dashboard/students/delete/{id}',[StudentController::class,'deleteStd']);
    Route::post('/dashboard/students/edit/{id}',[StudentController::class,'editStd']);
    //---------------------------

    //--------teachers routes------------  
    Route::get('/dashboard/teachers',[TeachersController::class,'index'])->name('teachers');
    Route::post('/dashboard/teachers',[TeachersController::class,'store']);
    Route::get('/dashboard/teachers/delete/{id}',[TeachersController::class,'deleteTeacher']);
    Route::post('/dashboard/teachers/edit/{id}',[TeachersController::class,'editTeacher']);
    //-----------------------------------

});

require __DIR__.'/auth.php';
