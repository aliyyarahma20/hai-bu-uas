<!-- resources/views/modules/language-module.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Language</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-gray-100 py-4 px-4">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-3xl p-6">
                <!-- Header Navigation -->
                <div class="flex items-center justify-between mb-6">
                    <!-- Left Side: Back Button -->

                    <a href="{{ route('user.dashboard', ['id' => $moduleStudentId])}}" class="w-10 h-10 rounded-full bg-[#4B5945] flex items-center justify-center">
                        <svg width="16" height="16" viewBox="0 0 24 24" class="text-white">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </a>

                    <!-- Center: Logo -->
                    <div class="flex-1 flex justify-center">
                        <img src="{{ asset('image/hai-bu.png') }}" alt="hai-bu" class="h-14 w-auto">
                    </div>

                    <!-- Right Side: Bookmark Button -->
                    @foreach ($modules as $module)
                    @if ($module->isBookmarkedByUser(auth()->id()))  <!-- Jika modul sudah dibookmark -->
                        <form action="{{ route('bookmarks.destroy', $module->bookmarks->first()) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bookmark-btn w-10 h-10 rounded-full bg-[#4B5945] flex items-center justify-center">
                                <svg width="16" height="16" viewBox="0 0 24 24" class="text-white">
                                    <path d="M19 21L12 16L5 21V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H17C17.5304 3 18.0391 3.21071 18.4142 3.58579C18.7893 3.96086 19 4.46957 19 5V21Z" 
                                        stroke="currentColor" 
                                        fill="currentColor" 
                                        stroke-width="2" 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                    @else  <!-- Jika modul belum dibookmark -->
                        <form action="{{ route('bookmarks.store') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="module_bahasa_id" value="{{ $module->id }}">
                            <input type="hidden" name="title" value="{{ $module->nama }}">
                            <button type="submit" class="bookmark-btn w-10 h-10 rounded-full bg-[#4B5945] flex items-center justify-center">
                                <svg width="16" height="16" viewBox="0 0 24 24" class="text-white">
                                    <path d="M19 21L12 16L5 21V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H17C17.5304 3 18.0391 3.21071 18.4142 3.58579C18.7893 3.96086 19 4.46957 19 5V21Z" 
                                        stroke="currentColor" 
                                        fill="none" 
                                        stroke-width="2" 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                    @endif
                @endforeach
                </div>

                <!-- Module Title -->
                @foreach ($modules as $module)
                <div class="flex items-center gap-3 mb-6">
                    <svg width="40" height="40" viewBox="0 0 81 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M40.5 40H9.28125V9.16669H40.5V40ZM40.5 40H71.7188V70.8334H40.5V40Z" stroke="#4B5945" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M24.8906 70.8333C33.5114 70.8333 40.5 63.9311 40.5 55.4167C40.5 46.9023 33.5114 40 24.8906 40C16.2698 40 9.28125 46.9023 9.28125 55.4167C9.28125 63.9311 16.2698 70.8333 24.8906 70.8333Z" stroke="#4B5945" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M56.1094 40C64.7302 40 71.7188 33.0977 71.7188 24.5834C71.7188 16.069 64.7302 9.16669 56.1094 9.16669C47.4886 9.16669 40.5 16.069 40.5 24.5834C40.5 33.0977 47.4886 40 56.1094 40Z" stroke="#4B5945" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h1 class="text-[#556B53] text-xl font-medium">
                        Modul: {{ $module->nama }}
                    </h1>
                </div>

                <!-- Content Cards -->
                <div class="flex flex-col items-center">
                    <!-- Single Centered Card -->
                    <div class="rounded-2xl text-[#4B5945] border-2 border-[#4B5945] p-8 w-full max-w-[850px]">
                        {!! nl2br(e($module->description)) !!}
                    </div>

                    <!-- Container untuk button -->
                    <!-- <div class="w-full max-w-[850px] flex justify-center">
                        <a href="#" 
                        class="mt-2 px-6 py-2 bg-[#4B5945] text-white text-sm rounded-full hover:bg-[#3d483c] transition-colors duration-200 flex items-center justify-center gap-2">
                            Mulai Kuis
                            <svg width="16" height="16" viewBox="0 0 24 24" class="text-white">
                                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            </svg>
                        </a>
                    </div> -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>