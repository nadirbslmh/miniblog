<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <form action="/login" method="post">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" id="email" required>
        <input type="password" name="password" value="{{ old('password') }}" id="password" required>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>