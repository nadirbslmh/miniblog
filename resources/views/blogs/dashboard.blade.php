{{-- <!DOCTYPE html>
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
</html> --}}

<x-dashboard-layout>
    <div class="container">
        <br>
        <div class="mt-8">
            <a href="/blogs/create" class="btn btn-primary"> <i class="bi-plus-circle"></i>&nbsp;Create a new blog</a>
        </div>

        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            @forelse ($blogs as $blog)    
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>
                        @auth
                        <div class="row">
                            <div class="col">
                                <a href="/blogs/{{$blog->id}}" class="btn btn-info"> <i class="bi-clipboard-fill"></i>&nbsp;View</a>
                            </div>
                            <div class="col">
                                <a href="/blogs/{{$blog->id}}/edit" class="btn btn-warning"> <i class="bi-pencil-square"></i>&nbsp;Edit</a>
                            </div>
                            <div class="col">
                                <form action="/blogs/{{$blog->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"> <i class="bi-trash-fill"></i>&nbsp;Delete</button>
                                </form> 
                            </div>
                        </div>
                        @endauth
                    </td>
                </tr>
            @empty
                <td colspan="3">
                    <p>no blogs available</p>
                </td>
            @endforelse
        </table>

        {{ $blogs->links() }}
    </div>
</x-dashboard-layout>