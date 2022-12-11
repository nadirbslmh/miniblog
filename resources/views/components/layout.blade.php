<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiniBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">MiniBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="/">
                <input class="form-control me-2" name="title" type="search" placeholder="Search blog..." aria-label="Search">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
            <div class="d-flex p-2">
                @auth
                <a href="/blogs/dashboard" class="btn btn-info me-2">
                    <i class="bi-collection-fill"></i>&nbsp;Dashboard
                </a>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="bi-box-arrow-in-right"></i>&nbsp;Logout</button>
                </form>

                @else
                <a href="/register" class="btn btn-success me-2">
                    <i class="bi-box-arrow-in-down-right"></i>&nbsp;Register
                </a>

                <a href="/login" class="btn btn-info">
                    <i class="bi-box-arrow-in-right"></i>&nbsp;Login
                </a>
                @endauth
            </div>
            </div>
        </div>
    </nav>
    {{$slot}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>