<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Details</title>
</head>
<body>
    <h1>{{ $blog->title }}</h1>

    <p>{{ $blog->content }}</p>

    <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/no-image.png') }}" alt="{{ $blog->title }}">
</body>
</html>