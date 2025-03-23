<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quickcart')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensures the body takes full height */
            font-family: Arial, sans-serif;
            background: #f0f8ff;
            color: #333;
        }
        header {
            background: #007bff;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logo h1 {
            margin: 0;
            color: #ffcc00;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
        }
        nav ul li {
            margin: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav ul li a:hover {
            background: #0056b3;
        }
        .mobile-search {
            display: none;
            padding: 10px;
            width: 100%;
            text-align: center;
        }
        .mobile-search input {
            padding: 8px;
            width: 80%;
            max-width: 300px;
            border: 2px solid #007bff;
            border-radius: 5px;
        }
        .mobile-search button {
            padding: 8px 15px;
            background: #ffcc00;
            color: #333;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }
        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 24px;
            color: #fff;
        }
        main {
            flex: 1; /* This will push the footer to the bottom */
        }
        footer {
            text-align: center;
            background: #007bff;
            color: white;
            padding: 15px 0;
            font-size: 14px;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: center;
            }
            nav ul {
                display: none;
                flex-direction: column;
                text-align: center;
                width: 100%;
            }
            nav ul li {
                margin: 10px 0;
            }
            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Ecommerce Project</h1>
        </div>
        <div class="menu-toggle" id="menu-toggle">☰</div>
        <nav>
            <ul id="nav-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                {{-- <li><a href="{{ route('category.index') }}">Categories</a></li> --}}
                {{-- <li><a href="{{ route('seller.index') }}">Sellers</a></li> --}}
                <li><a href="#" id="search-toggle">🔍</a></li>
            </ul>
        </nav>
        <div class="mobile-search" id="mobile-search">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>
    </header>
    
    <main>
        {{ $slot }}
    </main>
    
    <footer>
        <p>&copy; {{ date('Y') }} Quickcart. All rights reserved.</p>
    </footer>
    
    <script>
        $(document).ready(function(){
            $('#search-toggle').click(function(){
                $('#mobile-search').slideToggle();
            });
            $('#menu-toggle').click(function(){
                $('#nav-menu').slideToggle();
            });
        });
    </script>
</body>
</html>
