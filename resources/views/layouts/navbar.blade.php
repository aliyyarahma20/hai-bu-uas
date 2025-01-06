<div class="nav flex justify-end p-5 border-b border-[#EEEEEE]">
    <div class="flex gap-3 items-center">
        <div class="flex flex-col text-right">
            <p class="font-semibold">{{ Auth::user()->name }}</p>
        </div>
        <div class="w-[46px] h-[46px]">
            <img src="{{asset('images/photos/default-photo.svg')}}" alt="photo">
        </div>
    </div>
</div>

