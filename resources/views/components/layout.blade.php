<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Movieme is a source for movie content. Find ratings and reviews for the newest movies.">
    <meta name="keywords" content="Movieme, Movie, Movies, rating, reviews">
    <meta name="author" content="Chas Academy Students">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MovieMe</title>
    <link rel="icon" type="image/x-icon" href="https://icon-library.com/images/m-icon-png/m-icon-png-2.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Movieme</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/', 'admin/dashboard/users/create') ? 'active' : '' }}" href="/">Movies</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('watchlist') ? 'active' : '' }}" href="/watchlist">Watchlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('lists') ? 'active' : '' }}" href="/lists">Lists</a>
                    </li>
                    @endauth
                </ul>

                <div class="d-flex">
                    @auth
                    <!-- Checks if the user is sign in or a guest -->
                    <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome {{ auth()->user()->name }}!
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @can('admin')
                            <li><a class="dropdown-item" href="/admin/dashboard">Admin</a></li>
                            @endcan
                            @auth
                            <li class="nav-item">
                                <a class="dropdown-item" href="/lists/settings">Settings</a>
                            </li>
                            @endauth
                            <form method="POST" action="/logout">
                                @csrf
                                <li><button class="dropdown-item" type="submit">Log Out</button></li>
                            </form>
                        </ul>
                    </div>
                    @else
                    <a href="/login" class="btn btn-outline-dark">Login</a>
                    <a href="/register" class="btn btn-dark ms-2">Signup</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <x-flash />
    <!-- NAVBAR -->



    <main>

        {{ $slot }}

    </main>

    <!-- FOOTER -->
    <footer class="bg-light mt-auto">
        <div class="text-center text-dark py-5">
            © 2022 Copyright: MovieMe
        </div>
    </footer>
    <!-- FOOTER -->

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>