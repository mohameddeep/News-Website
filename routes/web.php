<?php

use App\Http\Controllers\Front\CatogryPostsController;
use App\Http\Controllers\Front\ContactUsController;
use App\Http\Controllers\Front\SearchController;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.contact');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe');
Route::get('/catogry/{slug}', CatogryPostsController::class)->name('catogries.posts');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
Route::get('/posts/comments/{post}', [PostController::class,'getPostComments'])->name('posts.comments.show');
Route::post('/posts/comments/store', [PostController::class,'storeComments'])->name('posts.comments.store');


Route::get('/contact-us',[ContactUsController::class,"create"])->name('contact.create');
Route::post('/contact-us',[ContactUsController::class,"store"])->name('contact.store');
Route::match(['get', 'post'], '/search', SearchController::class)->name('search');



// Route::get('cashe',function(){
//     Cache::put('test_key', 'Redis is working!', 10); // Cache for 10 minutes

// $value = Cache::get('test_key');

// dd($value);
// });
// testing