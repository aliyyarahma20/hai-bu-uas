@extends('layouts.user.index')

@section('title', 'Dashboard - Hai Bu')

@section('content')

<!-- Main Content -->
<div class="flex justify-between items-start mb-8">
    <h1 class="text-2xl font-bold text-[#4B5945]">Ruang hai-bu</h1>
    <h2 class="text-xl font-bold text-[#4B5945]">Mulai Perjalanan Belajarmu<br/>Bersama Hai-Bu!</h2>
</div>

<!-- Modules Grid -->

@php
$colors = ['bg-[#4B5945]', 'bg-[#66785F]', 'bg-[#B2C9AD]'];
@endphp

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        @forelse ($modules as $index => $modul)
        <a href="{{ route('dashboard.learning.index', ['moduleId' => $modul->id, 'module_student_id' => $moduleStudentId]) }}" 
        class="w-full text-left {{ $colors[$index % count($colors)] }} rounded-xl p-6 transition-transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#91AC8F] flex items-center gap-4">
            <!-- Container foto bulat -->
            <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center">
                <img src="{{Storage::url($modul->cover)}}" 
                alt="Module icon" 
                class="w-16 h-16 object-cover rounded-full" /> <!-- Ubah ukuran gambar -->
            </div>
            
            <!-- Konten modul -->
            <div class="flex-1 flex flex-col justify-center">
                <h3 class="text-white font-semibold text-lg mb-1">Modul {{$index + 1}}:</h3>
                <p class="text-white/90">{{$modul->nama}}</p>
            </div>
        </a>
        @empty
        <div class="col-span-3 text-center py-8 text-gray-500">
            Tidak ada modul tersedia
        </div>
        @endforelse
    </div>

<!-- Quiz Section -->
<div class="bg-white rounded-xl p-6 mb-8 flex justify-between items-center">
    <div>
        <h3 class="text-[#4B5945] font-semibold mb-2">Ayo tunjukkan cinta pada nusantara,<br/>dengan terus melestarikan ribuan bahasa daerahnya</h3>
    </div>
    <img src="{{asset('image/learning.png')}}" alt="Quiz illustration" class="h-24 w-auto"/>
</div>

<!-- Dictionary Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <!-- Kamus Bahasa Sunda - Indonesia -->
    <div class="bg-[#B2C9AD] rounded-xl p-6">
        <h3 class="text-white font-semibold mb-4">Kamus Bahasa<br/>Sunda - Indonesia</h3>
        @if ($kamus->isNotEmpty())
            @php
                $sundaKamus = $kamus->where('categories_id', 1)->first(); // Asumsikan ID kategori 1 untuk Sunda
            @endphp
            @if ($sundaKamus)
                <a href="{{ $sundaKamus->link }}" target="_blank">
                    <button class="text-white">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Kunjungi
                    </button>
                </a>
            @endif
        @else
            <p class="text-white">Tidak ada data untuk kategori ini.</p>
        @endif
    </div>

    <!-- Kamus Bahasa Jawa - Indonesia -->
    <div class="bg-[#4B5945] rounded-xl p-6">
        <h3 class="text-white font-semibold mb-4">Kamus Bahasa<br/>Jawa - Indonesia</h3>
        @if ($kamus->isNotEmpty())
            @php
                $jawaKamus = $kamus->where('categories_id', 2)->first(); // Asumsikan ID kategori 2 untuk Jawa
            @endphp
            @if ($jawaKamus)
                <a href="{{ $jawaKamus->link }}" target="_blank">
                    <button class="text-white">
                        <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Kunjungi
                    </button>
                </a>
            @endif
        @else
            <p class="text-white">Tidak ada data untuk kategori ini.</p>
        @endif
    </div>
</div>


<div id="calendar-container">
    <learning-calendar></learning-calendar>
</div>
<script src="{{ mix('js/app.js') }}"></script>

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
                        <p class="mt-2 text-sm text-gray-600">
                            {{ Str::limit($bookmark->moduleBahasa->description ?? 'Modul Bahasa', 200, '...') }}
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <!-- View Button -->
                        <a href="{{ route('dashboard.learning.index', ['moduleId' => $bookmark->moduleBahasa->id, 'module_student_id' => $moduleStudentId]) }}" 
                        class="text-[#4B5945] hover:text-[#2E3A2C] p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B5945]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                        <!-- Delete Button -->
                        <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bookmark ini?')">
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

        <!-- JavaScript untuk sidebar -->
        <script>
            function openRightSidebar() {
                document.getElementById('rightSidebar').classList.remove('translate-x-full');
                document.getElementById('rightOverlay').classList.remove('hidden');
                // Prevent body scrolling when sidebar is open
                document.body.style.overflow = 'hidden';
            }

            function closeRightSidebar() {
                document.getElementById('rightSidebar').classList.add('translate-x-full');
                document.getElementById('rightOverlay').classList.add('hidden');
                // Restore body scrolling
                document.body.style.overflow = 'auto';
            }

            // Optional: Close sidebar when clicking outside
            document.getElementById('rightOverlay').addEventListener('click', closeRightSidebar);
        </script>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</div>
@endsection

        