@extends('layouts.template')

@section('title', 'Modul Baru - Hai Bu')
    
@section('content')
<div id="menu-content" class="flex flex-col w-full pb-[30px]">
    {{-- Content --}}
    <div class="flex flex-col gap-10 px-5 mt-5">
        <div class="breadcrumb flex items-center gap-[30px]">
            <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Beranda</a>
            <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
            <a href="{{route('dashboard.module-bahasa.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Modul Bahasa</a>
            <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
            <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Modul Baru</a>
        </div>
    </div>
    <div class="header flex flex-col gap-1 px-5 mt-5">
        <h1 class="font-extrabold text-[30px] leading-[45px]">Tambah Modul Baru</h1>
    </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li class="py-5 px-5 bg-red-700 text-white">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        @endif



    <form method="POST" enctype="multipart/form-data" action="{{route('dashboard.module-bahasa.store')}}" class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10">
        @csrf
        <div class="flex flex-col gap-5 items-center">
            <input type="file" name="cover" id="icon" class="peer hidden" onchange="previewFile()" data-empty="true" required>
            <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden peer-data-[empty=true]:border-[3px] peer-data-[empty=true]:border-dashed peer-data-[empty=true]:border-[#EEEEEE]">
                <div class="relative file-preview z-10 w-full h-full hidden">
                    <img src="" class="thumbnail-icon w-full h-full object-cover" alt="thumbnail">
                </div>
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 text-center font-semibold text-sm text-[#7F8190]">Gambar <br>Modul</span>
            </div>
            <button type="button" class="flex shrink-0 p-[8px_20px] h-fit items-center rounded-full bg-[#91AC8F] font-semibold text-white hover:bg-[#66785F]" onclick="document.getElementById('icon').click()">
                Tambahkan Gambar
            </button>
        </div>
        <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">Nama Modul</p>
            <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                    <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                </div>
                <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Tuliskan nama modul" name="nama" required>
            </div>
        </div>
        <div class="group/category flex flex-col gap-[10px]">
            <p class="font-semibold">Kategori Bahasa</p>
            <div class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                    <img src="{{asset('images/icons/bill.svg')}}" class="w-full h-full object-contain" alt="icon">
                </div>
                <select id="category" class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{asset('images/icons/arrow-down.svg')}}')] bg-no-repeat bg-right " 
                name="categories_id" required>
                    <option value="" disabled selected hidden>Pilih satu kategori bahasa</option>
                    @forelse($categories as $category)
                    <option value="{{$category->id}}" class="font-semibold">
                        {{$category->name}}
                    </option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">Deskripsi</p>
            <div class="flex items-start w-[500px] p-[14px_16px] rounded-lg border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                    <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                </div>
                <textarea class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full h-[150px] outline-none resize-none" placeholder="Tuliskan isi modul" name="description" required></textarea>
            </div>
        </div>        
        
        <div class="flex items-center gap-5">
            <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#91AC8F] rounded-full font-bold text-white transition-all duration-300 hover:bg-[#66785F] text-center">Simpan Modul</button>
        </div>
    </form>
</div>

@endsection