<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Auth\ProviderSocialite;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\category;
use App\Models\product;
use App\Models\store;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use function Psy\debug;

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
Route::redirect('/','/login');
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth')->name('home.index');

Route::get('change/lang', [LocalizationController::class, 'lang_change'])->name('LangChange');
Route::get('/Products', [ProductController::class, 'index'])->name('product');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/stores', [StoreController::class, 'index'])->name('stores');



//for categories

Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'softdelete']);
Route::post('/category/add', [categoryController::class, 'store'])->name('store.category');

//for stores
Route::get('/store/edit/{id}', [StoreController::class, 'edit']);
Route::post('/store/update/{id}', [StoreController::class, 'update']);
Route::post('/store/add', [StoreController::class, 'store'])->name('add.store');
Route::get('/softdelete/store/{id}', [StoreController::class, 'softdelete']);
Route::get('search/{param?}', [StoreController::class, 'search'])->name('search');
//for products
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/add', [ProductController::class, 'store'])->name('store.product');
Route::get('/softdelete/product/{id}', [ProductController::class, 'softdelete']);
Route::post('/product/update/{id}', [ProductController::class, 'update']);
// });
// Route::middleware(['auth'])->group(function () {
//     Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
//     Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
//     Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
//     Route::post('/category/update/{id}', [CategoryController::class, 'update']);
//     Route::get('/softdelete/category/{id}', [CategoryController::class, 'softdelete']);
//     Route::get('/category/restore/{id}', [CategoryController::class, 'restore']);
//     Route::get('/pdelete/category/{id}', [CategoryController::class, 'pdelete']);
// });
Route::get('auth/google',[ProviderSocialite::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[ProviderSocialite::class,'callback']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
