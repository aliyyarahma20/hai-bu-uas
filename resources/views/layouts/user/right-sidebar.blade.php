<!-- SAVED -->
<div id="rightOverlay" class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 transition-opacity hidden" onclick="closeRightSidebar()"></div>
                
<!-- Right Sidebar -->
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
        <div id="savedItemsContainer" class="flex-grow overflow-y-auto p-6">
            @forelse(auth()->user()->bookmarks()->with('moduleBahasa')->latest()->take(5)->get() as $bookmark)
                <div id="savedItem{{ $bookmark->id }}" class="mb-4 rounded-lg border p-4 hover:bg-[#FAF2EA] group">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-medium text-[#4B5945]">{{ $bookmark->title }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ $bookmark->moduleBahasa->description ?? 'Modul Bahasa' }}</p>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <!-- View Button -->
                            <a href="{{ route('module.bahasa.show', $bookmark->moduleBahasa) }}" 
                            class="text-[#4B5945] hover:text-[#2E3A2C] p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('bookmarks.destroy', $bookmark) }}" 
                                method="POST" 
                                class="inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus bookmark ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    @if($bookmark->notes)
                        <p class="mt-2 text-sm text-gray-500 italic">{{ $bookmark->notes }}</p>
                    @endif
                </div>
            @empty
                <div class="text-center text-gray-500 py-8">
                    <p>Belum ada modul yang disimpan</p>
                    <p class="text-sm mt-2">Klik ikon bookmark pada modul untuk menyimpannya</p>
                </div>
            @endforelse

            @if(auth()->user()->bookmarks()->count() > 5)
                <a href="{{ route('bookmarks.index') }}" 
                class="block text-center text-[#4B5945] hover:text-[#2E3A2C] mt-4 py-2 border-t">
                    Lihat Semua Bookmark
                </a>
            @endif
        </div>
    </div>
</div>
