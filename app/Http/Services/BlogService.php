<?php

namespace App\Http\Services;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\File as FileValidation;

class BlogService
{
    private Blog $blogModel;

    public function __construct()
    {
        $this->blogModel = new Blog();
    }

    public function getAll()
    {
        $blogs = Blog::latest()->filter(request(['title']))->paginate(6);

        return $blogs;
    }

    public function create(Request $request)
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
    }

    public function delete(Blog $blog)
    {
        File::delete('storage/' . $blog->image);

        $blog->delete();
    }

}