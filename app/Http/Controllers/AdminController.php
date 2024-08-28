<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();
        return view('admin.dashboard', compact('users', 'posts', 'categories'));
    }
}
