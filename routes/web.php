<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
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
    return view('home',
[
    'title' => 'Home'
]);
});

Route::get('/about', function () {
    return view('about', [
        'nama' => 'Okta Daffa Ramadani',
        'kelas' => 'XII TKJ',
        'sekolah' => 'SMK Muhammadiyah Sampang',
        'title' => 'About'
    ]);
});

Route::get('/blog', [PostController::class, 'index']);


//halaman single

Route::get('/posts/{post:slug}',[PostController::class, 'show']);

Route::get('/categories', function(){
    return view('category',
    [
        'title' => 'Category',
        'categories' => Category::all()
    ]);
});

Route::get("/login", [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post("/login", [LoginController::class,'autenticate'])->middleware('guest');
Route::post("/logout", [LoginController::class,'logout'])->middleware('auth');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->middleware('guest');
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard'
    ]);
})->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories/', AdminCategoryController::class)->except('show')->middleware('admin');




