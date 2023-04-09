<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('beranda');
// });
// Route::get('/home', [PageController::class, 'home']);

// Route::get('/index', [PageController::class, 'index']);

// Route::get('/about', [PageController::class, 'about']);

// Route::get('/contact', [PageController::class, 'contact']);

Route::get('/komentar', [FrontController::class, 'komentar']);

// Route::get('/', [FrontController::class, 'index']);
Route::get('/about', [FrontController::class, 'about']);
Route::resource('customer', CustomerController::class);

Route::resource('comment', CommentController::class);

Route::resource('post', PostController::class);

Route::get('/home', [PostController::class, 'show']);
// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::post('/calculator', function () {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    switch ($operator) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            $result = $num1 / $num2;
            break;
        default:
            $result = 0;
    }

    return view('calculator', ['result' => $result]);
});
