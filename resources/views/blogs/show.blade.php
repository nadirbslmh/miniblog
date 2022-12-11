<x-layout>
    <div class="container text-center">
        <div class="col">
            <h1 class="mt-4">{{ $blog->title }}</h1>
            <img class="rounded mx-auto d-block" src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/no-image.png') }}" alt="{{ $blog->title }}">
        </div>
    </div>

    <div class="container">
        <p>{{ $blog->content }}</p>
    </div>
</x-layout>