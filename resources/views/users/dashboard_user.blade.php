<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/7.23.5/babel.min.js"></script>
        <title>hai-bu</title>
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

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        // Close sidebar when screen size becomes large
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) { // 1024px is the lg breakpoint
                closeSidebar();
            }
        });

        </script>
        <script type="text/babel">
            // const LearningCalendar = () => {
            //     const [currentDate] = React.useState(new Date());
            //     const [currentMonth, setCurrentMonth] = React.useState(new Date());

            //     const streakDays = {
            //         active: [new Date().toDateString()],
            //         secondary: [
            //             new Date(new Date().setDate(new Date().getDate() - 1)).toDateString(),
            //             new Date(new Date().setDate(new Date().getDate() - 2)).toDateString(),
            //         ]
            //     };

            //     const getDaysInMonth = (date) => {
            //         const year = date.getFullYear();
            //         const month = date.getMonth();
            //         const daysInMonth = new Date(year, month + 1, 0).getDate();
            //         const firstDayOfMonth = new Date(year, month, 1).getDay();
            //         return { daysInMonth, firstDayOfMonth };
            //     };

            //     const formatMonth = (date) => {
            //         return date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
            //     };

            //     const handlePrevMonth = () => {
            //         setCurrentMonth(new Date(currentMonth.setMonth(currentMonth.getMonth() - 1)));
            //     };

            //     const handleNextMonth = () => {
            //         setCurrentMonth(new Date(currentMonth.setMonth(currentMonth.getMonth() + 1)));
            //     };

            //     const renderCalendar = () => {
            //         const { daysInMonth, firstDayOfMonth } = getDaysInMonth(currentMonth);
            //         const days = [];
                    
            //         const weekdays = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
            //         weekdays.forEach(day => {
            //             days.push(
            //                 React.createElement('div', {
            //                     key: `header-${day}`,
            //                     className: "calendar-day text-sm font-medium text-gray-600"
            //                 }, day)
            //             );
            //         });

            //         for (let i = 0; i < firstDayOfMonth; i++) {
            //             days.push(React.createElement('div', { key: `empty-${i}`, className: "calendar-day" }));
            //         }

            //         for (let day = 1; day <= daysInMonth; day++) {
            //             const date = new Date(currentMonth.getFullYear(), currentMonth.getMonth(), day);
            //             const dateString = date.toDateString();
                        
            //             let className = "calendar-day hover:bg-gray-100 cursor-pointer";
            //             if (streakDays.active.includes(dateString)) {
            //                 className += " active";
            //             } else if (streakDays.secondary.includes(dateString)) {
            //                 className += " secondary";
            //             }

            //             days.push(
            //                 React.createElement('div', {
            //                     key: `day-${day}`,
            //                     className: className
            //                 }, day)
            //             );
            //         }

            //         return days;
            //     };

            //     return React.createElement('div', { className: "bg-[#4B5945] rounded-xl p-6" },
            //         React.createElement('h3', { className: "text-white font-semibold mb-4" }, "Progress Belajar mu-1"),
            //         React.createElement('div', { className: "bg-white rounded-lg p-4" },
            //             React.createElement('div', { className: "flex justify-between items-center mb-4" },
            //                 React.createElement('button', {
            //                     onClick: handlePrevMonth,
            //                     className: "text-[#4B5945] hover:bg-gray-100 p-1 rounded"
            //                 }, "←"),
            //                 React.createElement('span', { className: "text-[#4B5945] font-medium" },
            //                     formatMonth(currentMonth)
            //                 ),
            //                 React.createElement('button', {
            //                     onClick: handleNextMonth,
            //                     className: "text-[#4B5945] hover:bg-gray-100 p-1 rounded"
            //                 }, "→")
            //             ),
            //             React.createElement('div', { className: "grid grid-cols-7 gap-2" },
            //                 renderCalendar()
            //             )
            //         )
            //     );
            // };

            // Tunggu semua resource loaded
            window.onload = function() {
                const calendarContainer = document.getElementById('calendar-container');
                if (calendarContainer) {
                    const root = ReactDOM.createRoot(calendarContainer);
                    root.render(React.createElement(LearningCalendar));
                }
            };

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
        <style>
                @media (min-width: 1024px) {
                .main-content {
                    margin-left: 16rem; /* 256px / 16 = 16rem */
                }
            }
            .module-card {
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            
            .module-card::before {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 70%;
                height: 4px;
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 2px;
            }
            
            .progress-bar {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 4px;
                background-color: white;
                border-radius: 2px;
            }
            
            /* .calendar-day {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
            }
            
            .calendar-day.active {
                background-color: #4B5945;
                color: white;
            }
            
            .calendar-day.secondary {
                background-color: #66785F;
                color: white;
            } */
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FAF2EA]">
            <!-- Overlay - only visible on mobile when sidebar is open -->
            <div id="overlay" class="lg:hidden fixed inset-0 z-30 bg-gray-900 bg-opacity-50 transition-opacity hidden" onclick="closeSidebar()"></div>

            <!-- Sidebar - fixed on desktop, slideable on mobile -->
            <div id="sidebar" class="fixed left-0 top-0 z-40 h-screen w-64 bg-white shadow-lg transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full">
                <!-- Sidebar content remains the same -->
                <div class="flex h-full flex-col">
                    <!-- Logo Section -->
                    <div class="flex justify-center items-center py-8 border-b">
                        <img class="h-16 w-auto" src="{{asset('image/hai-bu.png')}}" alt="hai-bu logo" />
                    </div>
    
                <!-- Navigation Links -->
                <div class="flex-grow py-6">
                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex cursor-pointer items-center py-3 px-4 text-sm font-medium text-[#4B5945] hover:text-[#4B5945] hover:border-l-4 hover:border-l-[#4B5945]">
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
    
                        <a href="#" class="flex cursor-pointer items-center border-l-[#4B5945] py-3 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-[#4B5945] hover:text-[#4B5945]">
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
    
        <div class="lg:pl-64">     
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
                                            <input type="email" class="w-full p-2 border rounded-lg" value="{{ Auth::user()->email}}" />
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
        

                <!-- Main Content -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-8">
                        <h1 class="text-2xl font-bold text-[#4B5945]">Ruang hai-bu</h1>
                        <h2 class="text-xl font-bold text-[#4B5945]">Mulai Perjalanan Belajarmu<br/>Bersama Hai-Bu!</h2>
                    </div>

                    <!-- Modules Grid -->
                   
                    @php
                    $colors = ['bg-[#4B5945]', 'bg-[#66785F]', 'bg-[#B2C9AD]'];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        @forelse ($modules as $index => $modul)
                        <a href="{{route('dashboard.learning.index')}}" class="w-full text-left {{ $colors[$index % count($colors)] }} rounded-xl p-6 transition-transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <h3 class="text-white font-semibold">Modul {{$index + 1}}:</h3>
                            <p class="text-white mb-4">{{$modul->nama}}</p>
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white rounded-full h-2 transition-all duration-500" style="width: 70%"></div>
                            </div>
                        </a>
                        @empty
                        @endforelse
                    </div>
                    
                    <!-- Quiz Section -->
                    <div class="bg-white rounded-xl p-6 mb-8 flex justify-between items-center">
                        <div>
                            <h3 class="text-[#4B5945] font-semibold mb-2">Bahasa dengan jumlah penutur terbesar di Indonesia,<br/>dengan lebih dari 80 juta penutur</h3>
                        </div>
                        <img src="/api/placeholder/150/150" alt="Quiz illustration" class="h-24 w-auto"/>
                    </div>

                    <!-- Dictionary Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="bg-[#B2C9AD] rounded-xl p-6">
                            <h3 class="text-white font-semibold mb-4">Kamus Bahasa<br/>Sunda - Indonesia</h3>
                            <button class="text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </button>
                        </div>

                        <div class="bg-[#4B5945] rounded-xl p-6">
                            <h3 class="text-white font-semibold mb-4">Kamus Bahasa<br/>Indonesia - Sunda</h3>
                            <button class="text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="calendar-container">
                        <learning-calendar></learning-calendar>
                    </div>

                    <!-- Leaderboard -->
                    <div class="mt-8">
                        <h3 class="text-[#4B5945] font-semibold mb-4">Pelajar Terbaik Minggu ini</h3>
                        <div class="grid grid-cols-1 gap-3">
                            <div class="bg-[#B2C9AD] rounded-xl p-4 flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full"/>
                                    <span class="text-[#4B5945] font-medium">Rama Paramarta</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-[#4B5945]">Poin: 1980</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="bg-[#F3F8F2] rounded-xl p-4 flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full"/>
                                    <span class="text-[#4B5945] font-medium">Puti Andam</span>
                                </div>
                                <span class="text-[#4B5945]">Poin: 982</span>
                            </div>
                            <div class="bg-[#F3F8F2] rounded-xl p-4 flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full"/>
                                    <span class="text-[#4B5945] font-medium">Sofea Maharani</span>
                                </div>
                                <span class="text-[#4B5945]">Poin: 890</span>
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
                            @forelse(auth()->user()->bookmarks()->with('moduleBahasa')->latest()->take(5)->get() as $bookmark)
                                <div id="savedItem{{ $bookmark->id }}" class="mb-4 rounded-lg border p-4 hover:bg-[#FAF2EA] group">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-medium text-[#4B5945]">{{ $bookmark->title }}</h3>
                                            <p class="mt-2 text-sm text-gray-600">{{ $bookmark->moduleBahasa->description ?? 'Modul Bahasa' }}</p>
                                        </div>
                                        
                                        <!-- Action Buttons -->
                                        <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <!-- View Button -->
                                            <a href="{{ route('module.bahasa.show', $bookmark->moduleBahasa) }}" 
                                            class="text-[#4B5945] hover:text-[#2E3A2C] p-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            
                                            <!-- Delete Button -->
                                            <form action="{{ route('bookmarks.destroy', $bookmark) }}" 
                                                method="POST" 
                                                class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus bookmark ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    @if($bookmark->notes)
                                        <p class="mt-2 text-sm text-gray-500 italic">{{ $bookmark->notes }}</p>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center text-gray-500 py-8">
                                    <p>Belum ada modul yang disimpan</p>
                                    <p class="text-sm mt-2">Klik ikon bookmark pada modul untuk menyimpannya</p>
                                </div>
                            @endforelse

                            @if(auth()->user()->bookmarks()->count() > 5)
                                <a href="{{ route('bookmarks.index') }}" 
                                class="block text-center text-[#4B5945] hover:text-[#2E3A2C] mt-4 py-2 border-t">
                                    Lihat Semua Bookmark
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- JavaScript untuk sidebar -->
                <script>
                    function openRightSidebar() {
                        document.getElementById('rightSidebar').classList.remove('translate-x-full');
                        document.getElementById('rightOverlay').classList.remove('hidden');
                        // Prevent body scrolling when sidebar is open
                        document.body.style.overflow = 'hidden';
                    }

                    function closeRightSidebar() {
                        document.getElementById('rightSidebar').classList.add('translate-x-full');
                        document.getElementById('rightOverlay').classList.add('hidden');
                        // Restore body scrolling
                        document.body.style.overflow = 'auto';
                    }

                    // Optional: Close sidebar when clicking outside
                    document.getElementById('rightOverlay').addEventListener('click', closeRightSidebar);
                </script>

            </div>
        </div>
    </body>
</html>