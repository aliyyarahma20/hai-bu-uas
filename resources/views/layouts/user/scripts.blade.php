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