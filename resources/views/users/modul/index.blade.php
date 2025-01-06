<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hai-bu</title>
    
    <!-- External CSS & JS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/7.23.5/babel.min.js"></script>
</head>
<body class="bg-[#FAF2EA]">
    <!-- Overlay for sidebar -->
    <div id="overlay" class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 transition-opacity hidden" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 z-40 h-screen w-64 transform bg-white shadow-lg transition-transform duration-300 ease-in-out -translate-x-full">
        <div class="flex h-full flex-col">
            <!-- Logo Section -->
            <div class="flex justify-center items-center py-8 border-b">
                <img class="h-16 w-auto" src="{{asset('image/hai-bu.png')}}" alt="hai-bu logo" />
            </div>

            <!-- Navigation Links -->
            <div class="flex-grow py-6">
                <nav class="space-y-2">
                    <a href="fix-dashboard.html" class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium text-[#4B5945] hover:text-[#4B5945] hover:border-l-4 hover:border-l-[#4B5945]">
                        <svg class="mr-4 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="fix-modules.html" class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium text-gray-600 hover:text-[#4B5945] hover:border-l-4 hover:border-l-[#4B5945]">
                        <svg class="mr-4 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Modules
                    </a>

                    <a href="fix-leaderboard.html" class="flex cursor-pointer items-center border-l-[#4B5945] py-3 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-[#4B5945] hover:text-[#4B5945]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Leaderboard
                    </a>

                    <a href="fix-kamus.html" class="flex cursor-pointer items-center border-l-[#4B5945] py-3 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-[#4B5945] hover:text-[#4B5945]">
                        <svg class="mr-4 h-5 w-5 align-middle" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v14a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H6a2 2 0 00-2 2zM8 3v4l2-2 2 2V3" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 19a2 2 0 002 2h12a2 2 0 002-2" />
                        </svg>
                        Kamus
                    </a>

                    <a onclick="handleSavedClick()" class="flex cursor-pointer items-center border-l-[#4B5945] py-3 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-[#4B5945] hover:text-[#4B5945]">
                        <svg class="mr-4 h-5 w-5 align-middle" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-7 7 7V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                        </svg>
                        Saved
                    </a>
                </nav>
            </div>

            <!-- Logout -->
            <div class="border-t py-4">
                <form method ="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium text-gray-600 hover:text-[#4B5945]">
                        <svg class="mr-4 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 21H19a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-4M8 17l-5-5 5-5M3 12h12" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="p-4">
        <!-- Top Navigation Bar -->
        <div class="flex items-center gap-4">
            <button onclick="toggleSidebar()" class="p-2 hover:text-white hover:bg-[#D1E9D1] text-[#4B5945] rounded-lg focus:ring-2 focus:ring-[#4B5945] focus:text-white focus:bg-[#4B5945]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
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

            <!-- Profile Button -->
            <div class="relative">
                <button id="profileButton" onclick="toggleDropdown('profileDropdown')" 
                        class="h-10 w-10 overflow-hidden rounded-full focus:outline-none focus:ring-2 focus:ring-[#4B5945] focus:ring-offset-2 transition-all duration-200">
                    <img src="./image/jiwon.jpeg" alt="Profile" class="h-full w-full object-cover"/>
                </button>

                <!-- Profile Dropdown -->
                <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50">
                    <div class="p-6">
                        <div class="flex flex-col items-center gap-4">
                            <img src="./image/jiwon.jpeg" alt="Profile" class="w-24 h-24 rounded-full object-cover" />
                            <div class="space-y-4 w-full">
                                <div class="space-y-2">
                                    <label class="text-sm text-gray-600">Nama</label>
                                    <input type="text" class="w-full p-2 border rounded-lg" value="{{Auth::user()->name}}" />
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm text-gray-600">Email</label>
                                    <input type="email" class="w-full p-2 border rounded-lg" value="{{Auth::user()->email}}" />
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm text-gray-600">Kata Sandi</label>
                                    <input type="password" class="w-full p-2 border rounded-lg" />
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm text-gray-600">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="w-full p-2 border rounded-lg" />
                                </div>
                                <button class="w-full py-2 bg-[#4B5945] text-white rounded-lg hover:bg-opacity-90">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 bg-[#FAF2EA] min-h-screen flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        <!-- Module Card 1 -->
        <div class="relative bg-[#E8F3E8] rounded-xl shadow-sm overflow-hidden h-96 w-96">
            <div class="absolute top-4 right-4">
            <button class="p-2 rounded-full bg-white text-[#4B5945] hover:bg-[#D1E9D1] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
            </button>
            </div>
            <div class="p-8 flex flex-col h-full">
            <div class="mb-6 flex-1">
                <!-- Image space -->
                <div class="mb-6 h-40 flex items-center justify-center">
                <img src="/api/placeholder/160/160" alt="Level Bahasa" class="object-contain"/>
                </div>
                <div class="flex-1">
                <p class="text-base text-gray-600 mb-2">Modul 1</p>
                <h3 class="text-xl font-semibold text-[#4B5945]">Level Bahasa Sunda</h3>
                <p class="text-base text-gray-600 mt-3">Uji dan Temukan Sejauh mana Pemahamanmu</p>
                </div>
            </div>
            <div class="mt-auto">
                <div class="flex justify-between items-center text-base text-gray-600 mb-3">
                <span>Progress</span>
                <span>75%</span>
                </div>
                <div class="w-full bg-white rounded-full h-3">
                <div class="bg-[#4B5945] h-3 rounded-full transition-all duration-300" style="width: 75%"></div>
                </div>
            </div>
            </div>
        </div>
    
        <!-- Module Card 2 -->
        <div class="relative bg-[#E8F3E8] rounded-xl shadow-sm overflow-hidden h-96 w-96">
            <div class="absolute top-4 right-4">
            <button class="p-2 rounded-full bg-white text-[#4B5945] hover:bg-[#D1E9D1] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
            </button>
            </div>
            <div class="p-8 flex flex-col h-full">
            <div class="mb-6 flex-1">
                <!-- Image space -->
                <div class="mb-6 h-40 flex items-center justify-center">
                <img src="/api/placeholder/160/160" alt="Percakapan" class="object-contain"/>
                </div>
                <div class="flex-1">
                <p class="text-base text-gray-600 mb-2">Modul 2</p>
                <h3 class="text-xl font-semibold text-[#4B5945]">Percakapan Sehari-hari</h3>
                <p class="text-base text-gray-600 mt-3">Uji dan Temukan Sejauh mata Pemahamanmu</p>
                </div>
            </div>
            <div class="mt-auto">
                <div class="flex justify-between items-center text-base text-gray-600 mb-3">
                <span>Progress</span>
                <span>45%</span>
                </div>
                <div class="w-full bg-white rounded-full h-3">
                <div class="bg-[#4B5945] h-3 rounded-full transition-all duration-300" style="width: 45%"></div>
                </div>
            </div>
            </div>
        </div>
    
        <!-- Module Card 3 -->
        <div class="relative bg-[#E8F3E8] rounded-xl shadow-sm overflow-hidden h-96 w-96">
            <div class="absolute top-4 right-4">
            <button class="p-2 rounded-full bg-white text-[#4B5945] hover:bg-[#D1E9D1] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
            </button>
            </div>
            <div class="p-8 flex flex-col h-full">
            <div class="mb-6 flex-1">
                <!-- Image space -->
                <div class="mb-6 h-40 flex items-center justify-center">
                <img src="/api/placeholder/160/160" alt="Kata Kerja" class="object-contain"/>
                </div>
                <div class="flex-1">
                <p class="text-base text-gray-600 mb-2">Modul 3</p>
                <h3 class="text-xl font-semibold text-[#4B5945]">Kata Kerja</h3>
                <p class="text-base text-gray-600 mt-3">Uji dan Temukan Sejauh mana Pemahamanmu</p>
                </div>
            </div>
            <div class="mt-auto">
                <div class="flex justify-between items-center text-base text-gray-600 mb-3">
                <span>Progress</span>
                <span>25%</span>
                </div>
                <div class="w-full bg-white rounded-full h-3">
                <div class="bg-[#4B5945] h-3 rounded-full transition-all duration-300" style="width: 25%"></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- SAVED -->
    <div id="rightOverlay" class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 transition-opacity hidden" onclick="closeRightSidebar()"></div>
    <!-- Right Sidebar -->
    <div id="rightSidebar" class="fixed right-0 top-0 z-40 h-screen w-80 transform bg-white shadow-lg transition-transform duration-300 ease-in-out translate-x-full">
        <div class="flex h-full flex-col">
            <!-- Header Section -->
            <div class="flex items-center justify-between border-b px-6 py-4">
                <h2 class="text-xl font-semibold text-[#4B5945]">Tersimpan</h2>
                <button onclick="closeRightSidebar()" class="p-2 hover:bg-[#D1E9D1] rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#4B5945]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Saved Items Container -->
            <div id="savedItemsContainer" class="flex-grow overflow-y-auto p-6">
                <!-- Sample Saved Items -->
                <div id="savedItem1" class="mb-4 rounded-lg border p-4 hover:bg-[#FAF2EA]">
                    <h3 class="font-medium text-[#4B5945]">Kosa Kata Dasar</h3>
                    <p class="mt-2 text-sm text-gray-600">Modul pembelajaran bahasa Sunda untuk pemula</p>
                </div>
                
                <div id="savedItem2" class="mb-4 rounded-lg border p-4 hover:bg-[#FAF2EA]">
                    <h3 class="font-medium text-[#4B5945]">Percakapan Sehari-hari</h3>
                    <p class="mt-2 text-sm text-gray-600">Latihan percakapan dasar bahasa Sunda</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sidebar functions
        const sidebar = {
            toggle() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            },
            
            close() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        };

        // Dropdown functions
        const dropdowns = {
            toggle(id) {
                const dropdown = document.getElementById(id);
                const otherDropdown = id === 'notificationDropdown' ? 
                    document.getElementById('profileDropdown') : 
                    document.getElementById('notificationDropdown');
                
                dropdown.classList.toggle('hidden');
                otherDropdown.classList.add('hidden');
            },

            handleClickOutside(e) {
                const notifDropdown = document.getElementById('notificationDropdown');
                const profileDropdown = document.getElementById('profileDropdown');
                const notifButton = document.getElementById('notificationButton');
                const profileButton = document.getElementById('profileButton');

                if (!notifButton.contains(e.target) && !notifDropdown.contains(e.target)) {
                    notifDropdown.classList.add('hidden');
                }
                if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.add('hidden');
                }
            }
        };

        // Search functionality
        const search = {
            init() {
                const searchInput = document.getElementById('searchInput');
                const searchButton = document.getElementById('searchButton');

                const toggleButton = () => {
                    if (searchInput.value.length > 0 || document.activeElement === searchInput) {
                        searchButton.classList.add('opacity-0', 'pointer-events-none');
                    } else {
                        searchButton.classList.remove('opacity-0', 'pointer-events-none');
                    }
                };

                searchInput.addEventListener('focus', toggleButton);
                searchInput.addEventListener('blur', toggleButton);
                searchInput.addEventListener('input', toggleButton);
            }
        };

        // Event listeners
        window.addEventListener('click', dropdowns.handleClickOutside);
        window.addEventListener('DOMContentLoaded', () => {
            search.init();
        });

        // Global function assignments for HTML onclick attributes
        window.toggleSidebar = sidebar.toggle;
        window.closeSidebar = sidebar.close;
        window.toggleDropdown = dropdowns.toggle;

         // Add these new functions
         const rightSidebar = {
        toggle() {
            const sidebar = document.getElementById('rightSidebar');
            const overlay = document.getElementById('rightOverlay');
            sidebar.classList.toggle('translate-x-full');
            overlay.classList.toggle('hidden');
        },
        
        close() {
            const sidebar = document.getElementById('rightSidebar');
            const overlay = document.getElementById('rightOverlay');
            sidebar.classList.add('translate-x-full');
            overlay.classList.add('hidden');
        }
    };

    // Update the existing event listeners
    window.addEventListener('DOMContentLoaded', () => {
        search.init();
        
        // Add click handler for saved menu item
        const savedMenuItem = document.querySelector('a[href="#"]:has(svg path[d="M5 5v14l7-7 7 7V5a2 2 0 00-2-2H7a2 2 0 00-2 2z"])');
        if (savedMenuItem) {
            savedMenuItem.addEventListener('click', (e) => {
                e.preventDefault();
                rightSidebar.toggle();
            });
        }
    });

    // Global function assignments
    window.closeRightSidebar = rightSidebar.close;

        function handleSavedClick() {
        sidebar.close();  // Menutup sidebar kiri
        rightSidebar.toggle();  // Membuka sidebar kanan
    }
    </script>
</body>
</html>