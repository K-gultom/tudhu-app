<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <title>@yield('title')</title> --}}
        <title>{{ config('app.name') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Ini CDN Icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <style>
            html, body {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
            }
    
            main {
                flex: 1;
            }
    
            .text {
                color: #ffff;
            }
            .text:hover {
                color: #000000;
                background-color: #ffff;
                border-radius: 20px;
                width: 90px;
                text-align: center;
            }
            .navbar-toggler-icon {
                filter: invert(1); /* Membuat warna ikon menjadi putih */
            }
            .navbar-toggler {
                border: none; /* Menghapus border */
            }

            .navbar-toggler:focus {
                box-shadow: none; /* Menghapus efek fokus */
            }

        </style>
        @include('sweetalert::alert')

        <nav class="navbar navbar-expand-lg" style="background-color: rgb(2, 64, 209)">
            {{-- 2, 64, 209 --}}
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="/">Tudhu App</a>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 4.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5zm0 3.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5zm0 3.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link text" aria-current="page" href="/home">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu's
                                </a>
                                <ul class="dropdown-menu">
                                    {{-- <li><a class="dropdown-item" href="/add">Add</a></li> --}}
                                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </li> 
                        @else
                            <li class="nav-item">
                                <a class="nav-link text" aria-current="page" href="/">Login</a>
                            </li>
                        @endif
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    
        <main class="container">
            @yield('content')
        </main>
    
        <footer class="text-center p-2 bg-light">
            <p>&copy; {{ date('Y') }} GH Academy & Partner. Copyright</p>
        </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    
</html>