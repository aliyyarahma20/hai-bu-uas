@extends('layouts.template')

@section('title', 'Kamus  - Hai Bu')

@section('content')
<div id="menu-content" class="flex flex-col w-full pb-[30px]">
<div class="flex flex-col px-5 mt-5">
    <div class="w-full flex justify-between items-center">
        <div class="flex flex-col gap-1">
            <p class="font-extrabold text-[30px] leading-[45px]">Kamus</p>
            <p class="text-[#7F8190]">Manajemen kamus setiap modul</p>
        </div>
    </div>
</div>
<div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
    <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
        <div class="flex shrink-0 w-[800px] justify-center">
            <p class="text-[#7F8190]">Category</p>
        </div>
        <div class="flex justify-center shrink-0 w-[120px]">
            <p class="text-[#7F8190]">Aksi</p>
        </div>
    </div>
    @forelse ($kamus as $kamus)
        <div class="list-items flex flex-nowrap justify-between pr-10">
            @if($kamus->category->name == "Bahasa Sunda" or $kamus->category->name == "Bahasa Minangkabau" )
                <div class="flex shrink-0 w-[800px] items-center justify-center">
                    <p class="p-[8px_16px] rounded-full bg-[#FFF2E6] font-bold text-sm text-[#F6770B]">{{$kamus->category->name}}</p>
                </div>
            @elseif($kamus->category->name == "Bahasa Jawa")
                <div class="flex shrink-0 w-[800px] items-center justify-center">
                    <p class="p-[8px_16px] rounded-full bg-[#EAE8FE] font-bold text-sm text-[#6436F1]">{{$kamus->category->name}}</p>
                </div>
            @elseif($kamus->category->name == "Bahasa Melayu" or $kamus->category->name == "Bahasa Madura")
                <div class="flex shrink-0 w-[800px] items-center justify-center">
                    <p class="p-[8px_16px] rounded-full bg-[#D5EFFE] font-bold text-sm text-[#066DFE]">{{$kamus->category->name}}</p>
                </div>
            @endif
            <div class="flex shrink-0 w-[120px] items-center">
                <div class="relative h-[41px]">
                    <div class="menu-dropdown w-[120px] max-h-[41px] overflow-hidden absolute top-0 p-[10px_16px] bg-white flex flex-col gap-3 border border-[#EEEEEE] transition-all duration-300 hover:shadow-[0_10px_16px_0_#0A090B0D] rounded-[18px]">
                        <button onclick="toggleMaxHeight(this)" class="flex items-center justify-between font-bold text-sm w-full">
                            Menu
                            <img src="{{asset('images/icons/arrow-down.svg')}}" alt="icon">
                        </button>
                        <a href="" class="flex items-center justify-between font-bold text-sm w-full">
                            Edit Kamus
                        </a>
                        
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        <form method="POST" action="{{route('dashboard.kamus.destroy', $kamus)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center justify-between font-bold text-sm w-full text-[#FD445E]">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
</div>

@endsection
