<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit a blog</title>
</head>
<body>
    <form action="/blogs/{{ $blog->id }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" id="title" value="{{ $blog->title }}" required>    
        <input type="text" name="content" id="content" value="{{ $blog->content }}" required>

        <button type="submit">update</button>
    </form>
</body>
</html>