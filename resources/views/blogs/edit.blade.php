<x-dashboard-layout>
     <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <a href="/blogs/dashboard" class="btn btn-secondary"> <i class="bi-arrow-left"></i>&nbsp;Go back</a>

                <h5 class="card-title text-center">Edit blog</h5>
                <form action="/blogs/{{ $blog->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Blog Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $blog->title }}" required>
                        @error('title')
                            <div class="mt-8">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Blog Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control" id="content" required>{{ $blog->content }}</textarea>
                        @error('content')
                            <div class="mt-8">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Blog Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                            <div class="mt-8">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                        
                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/no-image.png') }}" alt="{{ $blog->title }}" width="300" height="200">
                    </div>
                    
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>