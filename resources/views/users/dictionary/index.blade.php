@extends('layouts.user.index')

@section('title', 'Modules - Hai Bu')

@section('content')

<!-- Main Content -->
<div class="flex justify-between items-start mb-8">
    <h1 class="text-2xl font-bold text-[#4B5945]">Ruang hai-bu</h1>
    <h2 class="text-xl font-bold text-[#4B5945]">Mulai Perjalanan Belajarmu<br/>Bersama Hai-Bu!</h2>
</div>

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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </div>


@endsection

        