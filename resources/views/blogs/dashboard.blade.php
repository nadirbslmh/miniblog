<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>

    @auth
        <a href="/blogs/create">Create a new blog</a>
         <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
         </form>
    @else
         <a href="/register">Register now!</a>
         <a href="/login">Login</a>
    @endauth
    
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        @forelse ($blogs as $blog)    
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->content }}</td>
                <td>
                    @auth
                    <a href="/blogs/{{$blog->id}}">View</a>
                    <a href="/blogs/{{$blog->id}}/edit">Edit</a>
                    <form action="/blogs/{{$blog->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    @endauth
                </td>
            </tr>

        @empty
            <td colspan="3">
                <p>no blogs available</p>
            </td>
        @endforelse
    </table>
</body>
</html>