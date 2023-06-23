<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Blog';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->nama;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'By ' . $author->name;
        }
        return view('posts',
        [
            'title' => $title,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->with(['author','category'])->paginate(7),
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            'title' => 'post',
            'post' => $post
        ]);
    }
}
