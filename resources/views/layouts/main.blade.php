<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class = "body-color">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark nav-bg-color">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                {{-- If user is logged in --}}
                @if (auth()->check())
                    {{-- If user is admin --}}
                    @if (auth()->user()->role === 1)
                        <ul class=" navbar-nav navbar-nav-scroll">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.showUser') }}">All Users</a>
                            </li>
                        </ul>
                        <ul class=" navbar-nav navbar-nav-scroll ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                            </li>
                        </ul>
                        @elseif (auth()->user()->role ===0)
                        <ul class=" navbar-nav navbar-nav-scroll">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.edit') }}">Update Profile</a>
                            </li>
                        </ul>
                        <ul class=" navbar-nav navbar-nav-scroll ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
                            </li>
                        </ul>
                    @endif
                @else
                    {{-- If no user is logged in --}}
                    <ul class=" navbar-nav navbar-nav-scroll ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                @endif


            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
