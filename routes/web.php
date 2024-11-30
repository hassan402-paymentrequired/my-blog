<?php

use App\Http\Controllers\Blog\BlogPostController;
use App\Livewire\BlogPost;
use App\Livewire\Connect;
use App\Livewire\CreatePost;
use App\Livewire\EditPost;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', Home::class)->name('home');
Route::get('/blog-post/{blog_post}', BlogPost::class)->name("show.blog.post");
Route::get('/create-blog-post', CreatePost::class)->name("create.blog");
Route::get('/connect', Connect::class)->name("connect.with.me");
Route::get('/blog-post/{id}/edit', EditPost::class)->name('posts.edit');
