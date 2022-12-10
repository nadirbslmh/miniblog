<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a new blog</title>
</head>
<body>
    <form action="/blogs" method="post">
        @csrf
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>    
        <input type="text" name="content" id="content" value="{{ old('content') }}" required>

        <button type="submit">create</button>
    </form>
</body>
</html>