<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3a86ff;
            --secondary-color: #8338ec;
            --light-bg: #f8f9fa;
            --dark-text: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
            background-color: #f5f7fa;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white !important;
            padding: 0.8rem 1rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.4rem;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--dark-text);
            margin: 0 0.3rem;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer {
            background-color: var(--light-bg);
            padding: 1.5rem 0;
            text-align: center;
            margin-top: 3rem;
        }
        
        .user-avatar {
            height: 30px;
            width: 30px;
            border-radius: 50%;
            margin-right: 8px;
        }
        
        .active-nav-link {
            color: var(--primary-color) !important;
            font-weight: 600;
        }
        
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop-code me-2"></i>Welcome
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('profile.show') }}">
                                <i class="fas fa-user-circle me-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('posts.index') }}">
                                <i class="fas fa-clipboard-list me-1"></i> All Posts
                            </a>
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users-cog me-1"></i> Manage Users
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i> Register
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                    @endauth
                </ul>
                
                @auth
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary" style="border-radius: 20px;">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('index')
        @yield('show')
        @yield('content')
        @yield('edit')
    </div>
    
    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 Your Website. All rights reserved.</p>
            <div class="mt-2">
                <a href="#" class="text-decoration-none me-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-decoration-none me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-decoration-none me-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-decoration-none"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>