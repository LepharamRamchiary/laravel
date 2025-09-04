<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = Post::with(["comments", "user"])->get();
    return response()->json($posts);
});

Route::get("/createUser", function() {
    $user = User::create([
        "name" => "lepha1",
        "email" => "lepha1@gmail.com",
        "password" => Hash::make("securepassword"),
    ]);

    return response()->json($user);
});

Route::get("/createPost", function() {
    $post = new Post([
        "caption" => "My first post 24",
    ]);

    $post->user_id = "01k49nv9pg5gk6r8wb3s0kvtj9";
    $post->save();

    return response("created post!");
});

Route::get("/updatePost/{id}", function(Request $req, string $id) {
    $caption = $req->query("caption");
    $post = Post::find($id);
    $post->caption = $caption;
    $post->save();

    return response()->json($post);
});

Route::get("/createComment", function() {
    $comment = Comment::create([
        "user_id" => "01k49nv9pg5gk6r8wb3s0kvtj9",
        "post_id" => "01k49nwbsgtabx7b2rnfdyscr6",
        "content" => "Great post!",
    ]);

    return response()->json($comment);
});