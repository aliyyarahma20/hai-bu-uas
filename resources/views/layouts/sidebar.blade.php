<div class="w-full flex flex-col gap-[30px]">
    <a href="index.html" class="flex items-center justify-center">
        <img src="{{asset('images/logo/hai-bu.png')}}" alt="logo">
    </a>
    <ul class="flex flex-col gap-3">
        <li>
            <h3 class="font-bold text-xs text-[#A5ABB2]">Manajemen</h3>
        </li>
        <li>
            <a href="{{ route('dashboard.module-bahasa.index') }}" 
               class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 
                       {{ in_array(request()->route()->getName(), ['dashboard.module-bahasa.index', 'dashboard.module-bahasa.edit', 'dashboard.module-bahasa.show', 'dashboard.module-bahasa.create', 'dashboard.question.edit']) ? 'bg-[#91AC8F] text-white' : 'hover:bg-[#66785F]' }} transition-all duration-300">
                <div>
                    <img src="{{ asset('images/icons/modulbahasa.svg') }}" alt="icon">
                </div>
                <p class="font-semibold transition-all duration-300 {{ request()->routeIs('dashboard.module-bahasa.index') ? 'text-white' : 'hover:text-white' }}">Modul Bahasa</p>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.user.index') }}" 
               class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 
                     {{ in_array(request()->route()->getName(), ['dashboard.user.index', 'dashboard.user.edit']) ? 'bg-[#91AC8F] text-white' : 'hover:bg-[#66785F]' }}
                 transition-all duration-300">
                <div>
                    <img src="{{ asset('images/icons/profile-2user.svg') }}" alt="icon">
                </div>
                <p class="font-semibold transition-all duration-300 {{ request()->routeIs('dashboard.user.index') ? 'text-white' : 'hover:text-white' }}">Pengguna</p>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.kamus.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 {{ in_array(request()->route()->getName(), ['dashboard.kamus.index']) ? 'bg-[#91AC8F] text-white' : 'hover:bg-[#66785F]' }}">
                <div>
                    <img src="{{asset('images/icons/chart-2.svg')}}" alt="icon">
                </div>
                <p class="font-semibold transition-all duration-300 {{ request()->routeIs('dashboard.kamus.index') ? 'text-white' : 'hover:text-white' }}">Kamus</p>
            </a>
        </li>
    </ul>
    <ul class="flex flex-col gap-3">
        <li>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="p-[10px_16px] w-full flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#66785F]">
                <div>
                    <img src="{{asset('images/icons/security-safe.svg')}}" alt="icon">
                </div>
                <p class="font-semibold transition-all duration-300 hover:text-white">Keluar</p>
            </button>
            </form>
        </li>
    </ul>
</div>