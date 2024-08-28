<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $request['code'] = Str::slug($request->title);
        $params = $request->all();
        Category::create($params);

        session()->flash('success', 'Категория добавлена ' . $request->title);

        return redirect()->route('admin-categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $admin_category)
    {
        return view('admin.categories.form', compact('admin_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $admin_category)
    {
        $params = $request->all();
        $admin_category->update($params);

        session()->flash('success', 'Категория ' . $request->title . ' обновлена');
        return redirect()->route('admin-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $admin_category)
    {
        $admin_category->delete();
        session()->flash('success', 'Категория ' . $admin_category->title . ' удалена');
        return redirect()->route('admin-categories.index');
    }
}
