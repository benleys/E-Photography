<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController as FrontUserController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Auth::routes();

//------------------------------------------GUEST------------------------------------------
Route::get('/', [FrontendController::class, 'index'])->name('frontindex');

//------------------------------------------USER------------------------------------------
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/my-profile', [FrontUserController::class, 'myprofile'])->name('my-profile');
Route::post('/update-my-profile', [FrontUserController::class, 'update'])->name('update-my-profile');

Route::get('/portfolio', [FrontUserController::class, 'portfolio'])->name('portfolio');
Route::get('/aboutme', [FrontUserController::class, 'aboutme'])->name('aboutme');
Route::get('/contact', [FrontUserController::class, 'contact'])->name('contact');
Route::get('/faqs', [FrontUserController::class, 'faqs'])->name('faqs');

//------------------------------------------ADMIN------------------------------------------
Route::middleware(['auth', 'isAdmin'])->group(function() {
    //Route::get('/home', [DashboardController::class, 'index'])->name('adminHome');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    //--------Images---------
    Route::get('/images', [ImageController::class, 'index'])->name('images');
    // Upload image
    Route::get('/upload-image', [ImageController::class, 'create'])->name('upload-image');
    Route::post('/insert-image', [ImageController::class, 'store'])->name('insert-image');
    // Edit image (with url())
    Route::get('/edit-image/{id}', [ImageController::class, 'edit']);
    Route::put('/update-image/{id}', [ImageController::class, 'update']);
    Route::get('/delete-image/{id}', [ImageController::class, 'destroy']);

    //--------Categories---------
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    // Add Category
    Route::get('/add-category', [CategoryController::class, 'create'])->name('add-category');
    Route::post('/insert-category', [CategoryController::class, 'store'])->name('insert-category');
    // Edit Category (with url())
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);

    //--------Users---------
    Route::get('/users', [UserController::class, 'index'])->name('users');
    // Add User
    Route::get('/add-user', [UserController::class, 'create'])->name('add-user');
    Route::post('/insert-user', [UserController::class, 'store'])->name('insert-user');
    // Edit User (with url())
    Route::get('/edit-user/{id}', [UserController::class, 'edit']);
    Route::put('/update-user/{id}', [UserController::class, 'update']);
    Route::get('/delete-user/{id}', [UserController::class, 'destroy']);

    //--------FAQ Categories---------
    Route::get('/faqcategories', [FaqCategoryController::class, 'index'])->name('faqcategories');
    // Add FAQ Category
    Route::get('/add-faqcategory', [FaqCategoryController::class, 'create'])->name('add-faqcategory');
    Route::post('/insert-faqcategory', [FaqCategoryController::class, 'store'])->name('insert-faqcategory');
    // Edit FAQ Category (with url())
    Route::get('/edit-faqcategory/{id}', [FaqCategoryController::class, 'edit']);
    Route::put('/update-faqcategory/{id}', [FaqCategoryController::class, 'update']);
    Route::get('/delete-faqcategory/{id}', [FaqCategoryController::class, 'destroy']);

    //--------FAQ---------
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    // Add FAQ Category
    Route::get('/add-faq', [FaqController::class, 'create'])->name('add-faq');
    Route::post('/insert-faq', [FaqController::class, 'store'])->name('insert-faq');
    // Edit FAQ Category (with url())
    Route::get('/edit-faq/{id}', [FaqController::class, 'edit']);
    Route::put('/update-faq/{id}', [FaqController::class, 'update']);
    Route::get('/delete-faq/{id}', [FaqController::class, 'destroy']);
});