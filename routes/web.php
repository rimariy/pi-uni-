<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\HTTP\Controllers\studentsController;
use App\HTTP\Controllers\coursesController;
use App\HTTP\Controllers\studentstableController;
use App\HTTP\Controllers\ProjectController;
use App\HTTP\Controllers\TaskController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/addStudentS', function () {
    return view('addStudent');
});



Route::get('/student', [studentsController::class,'index'])->name('student.index');
Route::get('editStudent/{id}', [studentsController::class, 'edit'])->name('student.edit');
Route::put('updateStudent/{id}', [studentsController::class, 'update'])->name('updateStudent');
Route::delete('student/{id}', [studentsController::class, 'destroy'])->name('deleteStudent');



Route::get('/addStudent',[studentsController::class,'create'])->name('addStudent.index');
Route::post('/addStudent',[studentsController::class,'store']);




Route::get('/addtotable/{id}',[coursesController::class,'createAddToTable'])->name('addtotable.index');
Route::post('/addtotable/{id}',[studentsController::class,'addStudentCourses'])->name('addtotable.add');




Route::get('/Courses', [coursesController::class,'index'])->name('Courses.index');
Route::get('editCourses/{id}', [coursesController::class, 'edit'])->name('Courses.edit');
Route::put('updateCourses/{id}', [coursesController::class, 'update'])->name('updateCourses');
Route::delete('Courses/{id}', [coursesController::class, 'destroy'])->name('deleteCourses');


Route::get('/addCourses',[coursesController::class,'create'])->name('addCourses.index');
Route::post('/addCourses',[coursesController::class,'store']);



Route::get('/project/{id}', [ProjectController::class,'index'])->name('Project.index');
// Route::get('editCourses/{id}', [coursesController::class, 'edit'])->name('Courses.edit');
// Route::put('updateCourses/{id}', [coursesController::class, 'update'])->name('updateCourses');
// Route::delete('Courses/{id}', [coursesController::class, 'destroy'])->name('deleteCourses');


Route::get('/addProject/{id}/{id2}',[ProjectController::class,'create'])->name('addProject.index');
Route::post('/addProject/{id}/{id2}',[ProjectController::class,'store'])->name('addProject.add');



// Route::get('/Task/{id}', [TaskController::class,'taskView'])->name('Task.index');
// Route::post('/update-items', [TaskController::class,'updateTask'])->name('update.task');

Route::get('/Task/{id}',[TaskController::class,'index'])->name('Task.index');
Route::post('/task-sortable',[TaskController::class,'update'])->name('Task.update');

// Route::get('editCourses/{id}', [coursesController::class, 'edit'])->name('Courses.edit');
// Route::put('updateCourses/{id}', [coursesController::class, 'update'])->name('updateCourses');
// Route::delete('Courses/{id}', [coursesController::class, 'destroy'])->name('deleteCourses');

Route::get('/addTask/{id}',[TaskController::class,'create'])->name('addTask.index');
Route::post('/addTask/{id}',[TaskController::class,'store'])->name('addTask.add');


// Route::resource('student',App\Http\Controllers\studentsController::class);



//route
// Route::get('/', [TaskController::class,'updateTask']);


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


