<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>All Blogs!</h1>
        <a href="/register">Register now!</a>
        <a href="/login">Login</a>
    
    @forelse ($blogs as $blog)
        <div>
            <h1>{{ $blog->title }}</h1>
            <p>{{ $blog->content }}</p>
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
        </div>
    @empty
        <p>no blogs available!</p>
    @endforelse
</body>
</html>