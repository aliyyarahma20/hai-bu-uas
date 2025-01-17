
@php
    $routePrefix = request()->route()->getPrefix();
    $routeName = request()->route()->getName();
@endphp

<a href="{{ route('user.dashboard', ['id' => $moduleStudentId]) }}" 
   class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium 
   {{ request()->routeIs('user.dashboard') ? 'text-[#4B5945] border-l-4 border-l-[#4B5945] bg-[#F3F8F2]' : 'text-gray-600 hover:text-[#4B5945] hover:border-l-4 hover:border-l-[#4B5945]' }}">
    <svg class="mr-4 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
    </svg>
    Dashboard
</a>

<a href="{{ route('user.modules', ['id' => $moduleStudentId]) }}" 
   class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium 
   {{ request()->routeIs('user.modules') ? 'text-[#4B5945] border-l-4 border-l-[#4B5945] bg-[#F3F8F2]' : 'text-gray-600 hover:text-[#4B5945] hover:border-l-4 hover:border-l-[#4B5945]' }}">
    <svg class="mr-4 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
    </svg>
    Modules
</a>

<a href="{{ route('user.kamus')}} "
   class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium 
   {{ request()->routeIs('user.kamus') ? 'text-[#4B5945] border-l-4 border-l-[#4B5945] bg-[#F3F8F2]' : 'text-gray-600 hover:text-[#4B5945] hover:border-l-4 hover:border-l-[#4B5945]' }}">
    <svg class="mr-4 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v14a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H6a2 2 0 00-2 2zM8 3v4l2-2 2 2V3" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 19a2 2 0 002 2h12a2 2 0 002-2" />
    </svg>
    Kamus
</a>

<a onclick="handleSavedClick()" 
   class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium 
   {{ str_contains($routeName, 'saved') ? 'text-[#4B5945] border-l-4 border-l-[#4B5945] bg-[#F3F8F2]' : 'text-gray-600 hover:text-[#4B5945] hover:border-l-4 hover:border-l-[#4B5945]' }}">
    <svg class="mr-4 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-7 7 7V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
    </svg>
    Saved
</a>