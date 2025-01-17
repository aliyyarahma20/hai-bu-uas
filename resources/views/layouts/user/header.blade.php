<!-- Main Content -->
<div class="p-4">
    <div class="flex items-center gap-4">
        <!-- Tombol hamburger hanya muncul di mobile (< lg) -->
        <button onclick="toggleSidebar()" class="block lg:hidden p-2 hover:text-white hover:bg-[#D1E9D1] text-[#4B5945] rounded-lg focus:ring-2 focus:ring-[#4B5945] focus:text-white focus:bg-[#4B5945]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        
        <!-- Search bar -->
        <div class="relative flex-1">
            <input type="text" 
                id="searchInput"
                placeholder="Apa yang kamu cari?" 
                class="w-full rounded-full bg-white px-4 py-2 shadow-sm 
                        border border-gray-200 
                        placeholder-gray-400
                        focus:outline-none focus:ring-2 focus:ring-[#4B5945] focus:border-transparent
                        transition-all duration-200"/>
            <button id="searchButton" 
                    class="absolute right-3 top-1/2 -translate-y-1/2 
                        p-1 rounded-full
                        hover:bg-[#D1E9D1] 
                        transition-all duration-200 opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5 text-gray-400 hover:text-[#4B5945]" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke="currentColor">
                    <path stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>

        <!-- Notification Button -->
        <div class="relative">
            <button id="notificationButton" onclick="toggleDropdown('notificationDropdown')" 
                    class="p-2 text-[#4B5945] hover:text-white hover:bg-[#D1E9D1] rounded-lg focus:ring-2 focus:ring-[#4B5945] focus:text-white focus:bg-[#4B5945]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>

            <!-- Notification Dropdown -->
            <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">Notifikasi</h3>
                    <div class="border-t pt-2">
                        <div class="text-sm text-gray-600 py-2">Belum ada notifikasi baru</div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div id="notification" class="fixed top-20 right-5 bg-[#91AC8F] text-white px-4 py-3 rounded-lg shadow-lg flex items-center space-x-4">
                <span>{{ session('success') }}</span>
                <button onclick="hideNotification()" class="text-white font-bold">OK</button>
            </div>

            <script>
                function hideNotification() {
                    document.getElementById('notification').style.display = 'none';
                }
            </script>
        @endif
        <!-- Profile Button -->
        <div class="relative">
            <button id="profileButton" onclick="toggleDropdown('profileDropdown')" 
                    class="h-10 w-10 overflow-hidden rounded-full focus:outline-none focus:ring-2 focus:ring-[#4B5945] focus:ring-offset-2 transition-all duration-200">
                <img src="{{ $user->photos ? asset('storage/' . $user->photos) : asset('image/profile.jpg') }}" alt="Profile" class="h-full w-full object-cover"/>
            </button>

            <!-- Profile Dropdown -->
            <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50">
                <div class="p-6">
                    <div class="flex flex-col items-center gap-4">
                        <div class="space-y-4 w-full">
                            <form method="post" enctype="multipart/form-data" action="{{  route('dashboard.user.update', $user) }}" class="space-y-4">
                                @csrf
                                @method('patch')
                                <div class="flex flex-col items-center gap-4">
                                    <input type="file" name="photos" id="icon" class="peer hidden" onchange="previewFile()" data-empty="true">
                                    <div class="file-preview">
                                    <img src="{{ $user->photos ? asset('storage/' . $user->photos) : asset('image/profile.jpg') }}" alt="Profile" class="thumbnail-icon w-24 h-24 rounded-full object-cover" />
                                    </div>
                                    <button type="button" class="flex shrink-0 p-[8px_20px] h-fit items-center rounded-full bg-[#91AC8F] font-semibold text-white hover:bg-[#66785F]" onclick="document.getElementById('icon').click()">
                                        Ubah Foto
                                    </button>
                                </div>
                                <div>
                                    <label class="text-sm text-gray-600" for="name">Nama</label>
                                    <input id="name" name="name" type="text" class="w-full p-2 border rounded-lg" 
                                        value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600" for="email">Email</label>
                                    <input id="email" name="email" type="email" class="w-full p-2 border rounded-lg" 
                                        value="{{ old('email', $user->email) }}" required autocomplete="username" />
                                </div>

                                <button type="submit" class="w-full py-2 bg-[#4B5945] text-white rounded-lg hover:bg-opacity-90">
                                    Simpan Perubahan
                                </button>
                            </form>

                            <button id="changePasswordButton" onclick="togglePasswordForm()" 
                                    class="w-full py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                                Ganti Kata Sandi
                            </button>

                            <!-- Password Form (Hidden by Default) -->
                            <div id="passwordForm" class="hidden mt-4">
                                <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                                    @csrf
                                    @method('put')

                                    <div>
                                        <label class="text-sm text-gray-600" for="current_password">Kata Sandi Saat Ini</label>
                                        <input id="current_password" name="current_password" type="password" 
                                            class="w-full p-2 border rounded-lg" autocomplete="current-password" />
                                    </div>

                                    <div>
                                        <label class="text-sm text-gray-600" for="password">Kata Sandi Baru</label>
                                        <input id="password" name="password" type="password" 
                                            class="w-full p-2 border rounded-lg" autocomplete="new-password" />
                                    </div>

                                    <div>
                                        <label class="text-sm text-gray-600" for="password_confirmation">Konfirmasi Kata Sandi</label>
                                        <input id="password_confirmation" name="password_confirmation" type="password" 
                                            class="w-full p-2 border rounded-lg" autocomplete="new-password" />
                                    </div>

                                    <button type="submit" class="w-full py-2 bg-[#4B5945] text-white rounded-lg hover:bg-opacity-90">
                                        Simpan Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
    }

    function togglePasswordForm() {
        const passwordForm = document.getElementById('passwordForm');
        passwordForm.classList.toggle('hidden');
    }

    function previewFile() {
        const preview = document.querySelector('.thumbnail-icon'); 
        const file = document.querySelector('#icon').files[0]; 
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }

</script>