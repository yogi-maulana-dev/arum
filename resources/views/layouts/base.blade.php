<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Profit SaaS - Sistem Manajemen Arsip Digital')</title>
    <meta name="description" content="@yield('description', 'Kelola arsip digital bisnis Anda dengan mudah, aman, dan efisien bersama Profit SaaS.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
                    colors: {
                        brand: {
                            50:'#eef2ff', 100:'#e0e7ff', 200:'#c7d2fe', 300:'#a5b4fc',
                            400:'#818cf8', 500:'#6366f1', 600:'#4f46e5', 700:'#4338ca',
                            800:'#3730a3', 900:'#312e81', 950:'#1e1b4b',
                        },
                    },
                },
            },
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .scrollbar-thin::-webkit-scrollbar { width: 4px; }
        .scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: #c7d2fe; border-radius: 2px; }
        .gradient-hero { background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #06b6d4 100%); }
        .gradient-text { background: linear-gradient(135deg,#4f46e5,#7c3aed); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
        .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(79,70,229,.12); }
        .nav-scrolled { background: rgba(255,255,255,.95); backdrop-filter: blur(10px); box-shadow: 0 1px 20px rgba(0,0,0,.08); }
    </style>

    @yield('head')
</head>
<body class="h-full font-sans antialiased bg-gray-50 text-gray-900">
    @yield('content')
    @yield('scripts')
</body>
</html>
