<x-layout>
     <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Welcome to MiniBlog!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Write your thoughts in a blog</p>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($blogs as $blog)
        <div class="col">
            <div class="card border-primary mb-3 text-center">
                <img class="card-img-top" src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/no-image.png') }}" alt="{{ $blog->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="/blogs/{{ $blog->id }}" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="px-4 py-5 my-5 text-center">
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">no blogs available!</p>
            </div>
        </div>
        @endforelse
    </div>
    
</x-layout>