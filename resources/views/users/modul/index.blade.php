@extends('layouts.user.index')

@section('title', 'Modules - Hai Bu')

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

        