<?php

namespace App\Service;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostService
{
    public function createPost(string $caption): Post {
        $user = User::create([
            "name" => "John Doe",
            "email" => "oG0yS@example.com",
            "password" => Hash::make("securepassword"),
            "description" => "Just a regular user.",
        ]);

        $post = Post::create([
            "caption" => $caption,
            "user_id" => $user->id,
        ]);

        return $post;
    }
}