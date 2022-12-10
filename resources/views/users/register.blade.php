<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" id="name" required>
        <input type="email" name="email" value="{{ old('email') }}" id="email" required>
        <input type="password" name="password" value="{{ old('password') }}" id="password" required>
        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" required>
        
        <button type="submit">Register now</button>
    </form>
</body>
</html>