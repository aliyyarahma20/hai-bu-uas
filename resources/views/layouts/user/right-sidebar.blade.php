<div id="rightOverlay" class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 transition-opacity hidden" onclick="closeRightSidebar()"></div>

<div id="rightSidebar" class="fixed right-0 top-0 z-40 h-screen w-80 transform bg-white shadow-lg transition-transform duration-300 ease-in-out translate-x-full">
    <div class="flex h-full flex-col">
        <!-- Header Section -->
        <div class="flex items-center justify-between border-b px-6 py-4">
            <h2 class="text-xl font-semibold text-[#4B5945]">Tersimpan</h2>
            <button onclick="closeRightSidebar()" class="p-2 hover:bg-[#D1E9D1] rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#4B5945]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Saved Items Container -->
        @include('layouts.user.saved-items')
    </div>
</div>
