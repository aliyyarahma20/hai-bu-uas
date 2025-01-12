@extends('layouts.template')

@section('title', 'Pengguna - Hai Bu')

@section('content')
<div id="menu-content" class="flex flex-col w-full pb-[30px]">
<div class="flex flex-col px-5 mt-5">
    <div class="w-full flex justify-between items-center">
        <div class="flex flex-col gap-1">
            <p class="font-extrabold text-[30px] leading-[45px]">Pengguna</p>
            <p class="text-[#7F8190]">Manajemen data pengguna</p>
        </div>
    </div>
</div>
<div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
    <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
        <div class="flex shrink-0 w-[200px]">
            <p class="text-[#7F8190]">Pengguna</p>
        </div>
        <div class="flex justify-center shrink-0 w-[150px]">
            <p class="text-[#7F8190]">Email</p>
        </div>
        <div class="flex justify-center shrink-0 w-[120px]">
            <p class="text-[#7F8190]">Aksi</p>
        </div>
    </div>
    @forelse ($user as $user)
        <div class="list-items flex flex-nowrap justify-between pr-10">
            <div class="flex shrink-0 w-[200px]">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full">
                        <img src="{{Storage::url($user->photos)}}" class="object-cover" alt="thumbnail">
                    </div> 
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-bold text-lg">{{$user->name}}</p>
                        <p class="text-[#7F8190]">Pengguna</p>
                    </div>
                </div>
            </div>
            <div class="flex shrink-0 w-[150px]">
                <p class="font-semibold">{{$user->email}}</p>
            </div>
            <div class="flex shrink-0 w-[120px] items-center">
                <div class="relative h-[41px]">
                    <div class="menu-dropdown w-[120px] max-h-[41px] overflow-hidden absolute top-0 p-[10px_16px] bg-white flex flex-col gap-3 border border-[#EEEEEE] transition-all duration-300 hover:shadow-[0_10px_16px_0_#0A090B0D] rounded-[18px]">
                        <button onclick="toggleMaxHeight(this)" class="flex items-center justify-between font-bold text-sm w-full">
                            Menu
                            <img src="{{asset('images/icons/arrow-down.svg')}}" alt="icon">
                        </button>
                        <a href="{{ route('dashboard.user.edit', $user) }}" class="flex items-center justify-between font-bold text-sm w-full">
                            Detail
                        </a>
                        <form method="POST" action="{{route('dashboard.user.destroy', $user)}}">
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
