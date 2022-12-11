<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\File as FileValidation;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->filter(request(['title']))->paginate(6);

        return view('blogs.index', [
            'blogs' => $blogs
        ]);
    }

    public function dashboard()
    {
        $blogs = auth()->user()->blogs()->latest()->filter(request(['title']))->paginate(6);

        return view('blogs.dashboard', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => FileValidation::types(['jpg', 'png', 'jpeg', 'gif'])
        ]);

        $fields['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $fields['image'] = $request->file('image')->store('images', 'public');
        }

        Blog::create($fields);

        return redirect('/blogs/dashboard');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', [
            'blog' => $blog
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $fields = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => FileValidation::types(['jpg', 'png', 'jpeg', 'gif'])
        ]);

        if ($request->hasFile('image')) {
            File::delete('storage/' . $blog->image);
            $fields['image'] = $request->file('image')->store('images', 'public');
        }

        $blog->update($fields);

        return redirect('/blogs/dashboard');
    }

    public function destroy(Blog $blog)
    {
        File::delete('storage/' . $blog->image);

        $blog->delete();

        return redirect('/blogs/dashboard');
    }
}