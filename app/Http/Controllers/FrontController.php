<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Post};

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('show', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->latest()->get();
        return view ('welcome',compact('category','posts'));
    }
}
