<!-- resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mind-do! App</title>
    <!-- Include CSS and other dependencies -->
    @stack('styles')
</head>
<body>
    <div class="flex flex-col h-screen">
        {{-- <nav class="bg-gray-800 text-white py-4 px-6 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('logo.png') }}" alt="Mind-do! Logo" class="h-8 mr-2">
                    <span class="text-lg font-medium">Mind-do!</span>
                </a>
            </div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('tasks.index') }}" class="hover:text-gray-300">Tasks</a>
                <a href="{{ route('calendar.index') }}" class="hover:text-gray-300">Calendar</a>
                <a href="{{ route('stats.index') }}" class="hover:text-gray-300">Stats</a>
                <a href="{{ route('settings.index') }}" class="hover:text-gray-300">Settings</a>
                <div class="relative">
                    <input type="text" placeholder="Search" class="bg-gray-700 rounded-md px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-white">
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <a href="{{ route('profile.show') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('avatar.png') }}" alt="User Avatar" class="h-8 w-8 rounded-full">
                        <span class="text-gray-300">John Doe</span>
                    </a>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                        <!-- Profile dropdown menu -->
                    </div>
                </div>
                <a href="#" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                    <span class="absolute top-0 right-0 inline-block w-3 h-3 bg-red-600 rounded-full text-white font-medium text-xs leading-none pt-1">3</span>
                </a>
            </div>
        </nav> --}}
        

        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <!-- Include JavaScript and other dependencies -->
    @stack('scripts')
</body>
</html>