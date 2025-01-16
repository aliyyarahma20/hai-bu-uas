<div id="sidebar" class="fixed left-0 top-0 z-40 h-screen w-64 bg-white shadow-lg transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full">
    <div class="flex h-full flex-col">
        <!-- Logo Section -->
        <div class="flex justify-center items-center py-8 border-b">
            <img class="h-16 w-auto" src="{{asset('image/hai-bu.png')}}" alt="hai-bu logo" />
        </div>

        <!-- Navigation Links -->
        <div class="flex-grow py-6">
            <nav class="space-y-2">
                @include('layouts.user.navigation')
            </nav>
        </div>

        <!-- Logout -->
        <div class="border-t py-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium text-gray-600 hover:text-[#4B5945]">
                    <svg class="mr-4 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 21H19a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-4M8 17l-5-5 5-5M3 12h12" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>