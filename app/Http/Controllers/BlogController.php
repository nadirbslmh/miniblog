<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('blogs.index', [
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
        ]);

        $fields['user_id'] = 1; //TODO: replace with actual user

        if ($request->hasFile('image')) {
            $fields['image'] = $request->file('image')->store('images', 'public');
        }

        Blog::create($fields);

        return redirect('/');
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
        ]);

        $blog->update($fields);

        return redirect('/');
    }

    public function destroy(Blog $blog)
    {
        File::delete('storage/' . $blog->image);

        $blog->delete();

        return redirect('/');
    }
}