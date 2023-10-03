<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});




// Route::get('/test', [TestController::class , 'testaction']);








Route::get('/todos' , [TodoController::class , 'index']);
Route::get('/todos/create' , [TodoController::class , 'create']);
// Route::get('/todos/completed' , [TodoController::class , 'completed']);
Route::get('/todos/{todo}' , [TodoController::class , 'show']);
Route::post('/todos' , [TodoController::class , 'store']);
Route::get('/todos/{todo}/edit' , [TodoController::class , 'edit']);
Route::put('/todos/{todo}' , [TodoController::class , 'update']);
Route::delete('/todos/{todo}' , [TodoController::class , 'destroy']);
Route::post('/todos/{todo}' , [TodoController::class , 'done']);



;



Route::middleware('guest')->group(function () {
    Route::get('/register' , [AuthController::class , 'registerForm']);
    Route::post('/register' , [AuthController::class , 'register']);
    
    Route::get('/login' , [AuthController::class , 'loginForm']);
    Route::post('/login' , [AuthController::class , 'login']);

    
    
});

Route::middleware('auth')->group(function () {
    
    Route::post('/logout' , [AuthController::class , 'logout']);

    Route::get('/categories/create' , [CategoryController::class , 'create']);
    Route::post('/categories' , [CategoryController::class , 'store']);
    Route::get('/categories/{category}/edit' , [CategoryController::class , 'edit']);
    Route::put('/categories/{category}' , [CategoryController::class , 'update']);
    Route::delete('/categories/{category}' , [CategoryController::class , 'destroy']);

    
Route::get('/books/create' , [BookController::class , 'create']);
Route::post('/books' , [BookController::class , 'store']);
Route::get('/books/{book}/edit' , [BookController::class , 'edit'])->middleware('can:update,book');
Route::put('/books/{book}' , [BookController::class , 'update'])->middleware('can:update,book');

Route::delete('/books/{book}' , [BookController::class , 'destroy'])->middleware('can:delete,book');


});

    Route::get('/categories', [CategoryController::class , 'index']);
    Route::get('/categories/{category}' , [CategoryController::class , 'show']);

    Route::get('/books', [BookController::class , 'index']);
    Route::get('/books/{book}' , [BookController::class , 'show']);


    Route::middleware(['auth', 'super-admin'])->group(function () {
        Route::get('/dashboard', function () {
            return 'this is dashboard';
        });    
    }); 
    