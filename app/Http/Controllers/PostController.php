<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Service\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected PostService $postService)
    {
        
    }

    public function createPost(CreatePostRequest $req)
    {
        $validated = $req->validate();

        $caption = $validated['caption'];
        return response()->json($this->postService->createPost(caption: $caption), status:201);
    }

    public function updatePost(Request $req, string $id)
    {
        return $id;
    }
}
