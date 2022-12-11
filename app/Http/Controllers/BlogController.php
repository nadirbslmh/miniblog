<?php

namespace App\Http\Controllers;

use App\Http\Services\BlogService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogService $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $blogs = $this->service->getAll();

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
        $this->service->create($request);

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
        $this->service->update($request, $blog);

        return redirect('/blogs/dashboard');
    }

    public function destroy(Blog $blog)
    {
        $this->service->delete($blog);

        return redirect('/blogs/dashboard');
    }
}