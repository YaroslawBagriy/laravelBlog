<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::latest();
        if (request('search')) {
            $post->where('title', 'like', '%' . request('search') . '%')
            ->orwhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            'posts' => $posts->get()
        ]);
    }
}
