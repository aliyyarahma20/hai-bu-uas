@extends('layouts.template')

@section('title', 'Atur Modul - Hai Bu')
    
@section('content')
<div id="menu-content" class="flex flex-col w-full pb-[30px]">
    <div class="flex flex-col gap-10 px-5 mt-5">
        <div class="breadcrumb flex items-center gap-[30px]">
            <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Beranda</a>
            <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
            <a href="{{route('dashboard.module-bahasa.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Modul Bahasa</a>
            <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
            <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Atur Kuis</a>
        </div>
    </div>
    <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
        <div class="flex gap-6 items-center">
            <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
                <img src="{{Storage::url($modules->cover)}}" class="w-full h-full object-contain" alt="icon">
                <p class="p-[8px_16px] rounded-full bg-[#FFF2E6] font-bold text-sm text-[#F6770B] absolute bottom-0 transform -translate-x-1/2 left-1/2 text-nowrap">{{$modules->category->name}}</p>
            </div>
            <div class="flex flex-col gap-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">{{$modules->nama}}</h1>
                <div class="flex items-center gap-5">
                    <div class="flex gap-[10px] items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('images/icons/calendar-add.svg')}}" alt="icon">
                        </div>
                        <p class="font-semibold">{{\Carbon\Carbon::parse($modules->created_at)->translatedFormat('j F Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="course-test" class="mx-[70px] w-[870px] mt-[30px]">
        <h2 class="font-bold text-2xl">Kuis Modul</h2>
        <div class="flex flex-col gap-[30px] mt-2">
            <a href="{{route('dashboard.module-bahasa.create.question', $modules)}}" class="w-full h-[92px] flex items-center justify-center p-4 border-dashed border-2 border-[#0A090B] rounded-[20px]">
                <div class="flex items-center gap-5">
                    <div>
                        <img src="{{asset('images/icons/note-add.svg')}}" alt="icon">
                    </div>
                    <p class="font-bold text-xl">Tambahkan Pertanyaan Kuis</p>
                </div>
            </a>

            @forelse($questions as $question)
            <div class="question-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
                <div class="flex flex-col gap-[6px]">
                    <p class="text-[#7F8190]">Pertanyaan</p>
                    <p class="font-bold text-xl">{{$question->soal}}</p>
                </div>
                <div class="flex items-center gap-[14px]">
                    <a href="{{route('dashboard.question.edit', $question)}}" class="bg-[#4B5945] p-[14px_30px] rounded-full text-white font-semibold">Edit</a>
                    <form method="POST" action="{{route('dashboard.question.destroy', $question)}}">
                        @csrf
                        @method('DELETE')
                        <button class="w-[52px] h-[52px] flex shrink-0 items-center justify-center rounded-full bg-[#FD445E]">
                            <img src="{{asset('images/icons/trash.svg')}}" alt="icon">
                        </button>
                    </form>
                </div>
            </div>
            @empty
                <p>
                    Modul ini belum memiliki pertanyaan.
                </p>
            @endforelse

        </div>
    </div>
</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.getElementById('more-button');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    menuButton.addEventListener('click', function () {
    dropdownMenu.classList.toggle('hidden');
    });

    // Close the dropdown menu when clicking outside of it
    document.addEventListener('click', function (event) {
    const isClickInside = menuButton.contains(event.target) || dropdownMenu.contains(event.target);
    if (!isClickInside) {
        dropdownMenu.classList.add('hidden');
    }
    });
});
</script>
    
@endsection