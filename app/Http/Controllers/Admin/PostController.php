<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.posts.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, Post $post)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();

        unset($params['image']);
        if($request->has('image')){
            if($post->image != null) {
                Storage::delete($post->image);
            }
            $params['image'] = $request->file('image')->store('posts');
        }

        Post::create($params);

        session()->flash('success', 'Библиотека ' . $request->title . ' добавлена');
        return redirect()->route('admin-posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.products.show', compact('post'));
    }

    public function edit(Post $admin_post)
    {
        $categories = Category::get();
        session()->flash('success', 'Библиотека ' . $admin_post->title . ' добавлена');
        return view('admin.posts.form', compact('admin_post', 'categories'));
    }

    public function update(PostRequest $request, Post $admin_post)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();

        unset($params['image']);
        if($request->has('image')){
            if($admin_post->image != null) {
                Storage::delete($admin_post->image);
            }
            $path = $request->file('image')->store('posts');
            $params['image'] = $path;
        }

        $admin_post->update($params);
        session()->flash('success', 'Продукция ' . $admin_post->title . ' обновлена');
        return redirect()->route('admin-posts.index');
    }


    public function destroy(Post $admin_post)
    {
        $admin_post->delete();
        session()->flash('success', 'Библиотека ' . $admin_post->title . ' удалена');
        return redirect()->route('admin-posts.index');
    }

}
