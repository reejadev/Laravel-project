<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class,'index']);
 Route::get('/about',[PagesController::class,'about']);

Route::get('/about',[PagesController::class,'about']);
//     return view ('About Us');
// });

Route::get('/user/{id}/{comp}', [PagesController::class, 'show']);

Route::get('/employee',[EmployeeController::class, 'index']);
Route::get('/add-employee',[EmployeeController::class, 'create']);
Route::post('/store-employee',[EmployeeController::class, 'store']);
Route::get('/edit-employee/{id}',[EmployeeController::class, 'edit']);
Route::put('/update-employee/{id}',[EmployeeController::class, 'update']);

Route::get('/delete-employee/{id}',[EmployeeController::class, 'delete']);

//  Route::get('/users/{id}', [PagesController::class, 'users']);
//     return view ('User is:'.$id.''.'Company Name:'.$comp);
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::resource('posts', PostController::class);
});
