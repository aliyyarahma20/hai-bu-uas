<div class="flex items-center gap-4">
    <!-- Mobile hamburger button -->
    <button onclick="toggleSidebar()" class="block lg:hidden p-2 hover:text-white hover:bg-[#D1E9D1] text-[#4B5945] rounded-lg focus:ring-2 focus:ring-[#4B5945] focus:text-white focus:bg-[#4B5945]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    
    <!-- Search bar -->
    @include('layouts.user.search')

    <!-- Notification -->
    @include('layouts.user.notification')

    <!-- Profile -->
    @include('layouts.user.profile')
</div><div class="flex items-center gap-4">
    <!-- Mobile hamburger button -->
    <button onclick="toggleSidebar()" class="block lg:hidden p-2 hover:text-white hover:bg-[#D1E9D1] text-[#4B5945] rounded-lg focus:ring-2 focus:ring-[#4B5945] focus:text-white focus:bg-[#4B5945]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    
    <!-- Search bar -->
    @include('layouts.user.search')

    <!-- Notification -->
    @include('layouts.user.notification')

    <!-- Profile -->
    @include('layouts.user.profile')
</div>