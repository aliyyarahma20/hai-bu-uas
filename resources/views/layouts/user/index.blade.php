<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/7.23.5/babel.min.js"></script>
    <title>hai-bu</title>
    @include('layouts.user.styles')
    @include('layouts.user.scripts')
</head>
<body class="bg-[#FAF2EA]">
    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="lg:hidden fixed inset-0 z-30 bg-gray-900 bg-opacity-50 transition-opacity hidden" onclick="closeSidebar()"></div>
    
    @include('layouts.user.sidebar')
    
    <div class="lg:pl-64">
        <div class="p-4">
            @include('layouts.user.header')
        </div>
        
        <!-- Main Content -->
        <div class="p-6">
            @yield('content')
        </div>
    </div>

    @include('layouts.user.right-sidebar')
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>