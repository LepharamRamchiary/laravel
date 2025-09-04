<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Posts
Route::prefix("/posts")->group(function() {
    Route::get("/", [PostController::class, 'getPosts']);
    Route::post("/", [PostController::class, 'createPost']);
    Route::put("/{id}", [PostController::class, 'updatePost'])->whereUlid('id');
    Route::delete("/{id}", [PostController::class, 'deletePost']);
});

// Likes
Route::prefix("likes")->group(function() {
    Route::get("/", [LikeController::class, 'getLikes']);
    Route::delete("/{id}", [LikeController::class, 'unlikePost']);
});

// Comments
Route::prefix("/comments")->group(function() {
    Route::get("/", [CommentController::class, 'getComments']);
    Route::post("/", [CommentController::class, 'createComment']);
    Route::put("/{id}", [CommentController::class, 'updateComment']);
    Route::delete("/{id}", [CommentController::class, 'deleteComment']);
});

// Follow
Route::prefix("/follows")->group(function() {
    Route::get("/", [FollowController::class, 'getFollows']);
    Route::post("/", [FollowController::class, 'createFollow']);
    Route::put("/{id}", [FollowController::class, 'updateFollow']);
    Route::delete("/{id}", [FollowController::class, 'deleteFollow']);
});