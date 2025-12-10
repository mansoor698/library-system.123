<header class="bg-blue-50 border-b border-blue-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
        <div class="flex items-center justify-between py-4">
            
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-blue-700" fill="currentColor" viewBox="0 0 48 48">
                    <path d="M13.8261 30.5736C16.7203 29.8826 20.2244 29.4783 24 29.4783C27.7756 29.4783 31.2797 29.8826 34.1739 30.5736C36.9144 31.2278 39.9967 32.7669 41.3563 33.8352L24.8486 7.36089C24.4571 6.73303 23.5429 6.73303 23.1514 7.36089L6.64374 33.8352C8.00331 32.7669 11.0856 31.2278 13.8261 30.5736Z"/>
                </svg>
                <h1 class="text-lg font-bold text-blue-800">LibrarySystem</h1>
            </div>

            <!-- Hamburger Menu Button -->
            <button id="menuToggle" class="md:hidden text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Nav Links -->
            <nav id="navMenu" class="hidden md:flex flex-1 justify-center gap-4 text-sm font-medium">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded transition">
                    Home
                </a>
                <a href="{{ route('books.index') }}"
                   class="{{ request()->routeIs('admin.books.*') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded transition">
                    Books
                </a>
                
                @if(Auth::check() && Auth::user()->is_admin)
                    <a href="{{ route('admin.borrowers.index') }}"
                       class="{{ request()->routeIs('admin.borrowers.index') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded transition">
                        Borrowers
                    </a>
                @endif
                <a href="{{ route('about') }}"
                   class="{{ request()->routeIs('about') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded transition">
                    About
                </a>
                <a href="{{ route('contact') }}"
                   class="{{ request()->routeIs('contact') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded transition">
                    Contact
                </a>
            </nav>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center gap-3 ml-auto">
                @auth
                    <a href="{{ Auth::user()->is_admin ? route('admin.dashboard') : route('dashboard') }}"
                       class="{{ request()->routeIs(Auth::user()->is_admin ? 'admin.dashboard' : 'dashboard') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded text-sm font-medium transition">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-blue-900 hover:bg-blue-100 px-4 py-2 rounded text-sm font-medium transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="{{ request()->routeIs('login') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded text-sm font-medium transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="{{ request()->routeIs('register') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded text-sm font-medium transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden flex-col space-y-2 pb-4">
            <nav class="flex flex-col gap-2 text-sm font-medium">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded">
                    Home
                </a>
                <a href="{{ route('books.index') }}"
                   class="{{ request()->routeIs('admin.books.*') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded">
                    Books
                </a>
                @if(Auth::check() && Auth::user()->is_admin)
                    <a href="{{ route('admin.borrowers.index') }}"
                       class="{{ request()->routeIs('admin.borrowers.index') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded">
                        Borrowers
                    </a>
                @endif
                <a href="{{ route('about') }}"
                   class="{{ request()->routeIs('about') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded">
                    About
                </a>
                <a href="{{ route('contact') }}"
                   class="{{ request()->routeIs('contact') ? 'bg-blue-700 text-white' : 'text-blue-900 hover:bg-blue-100' }} px-4 py-2 rounded">
                    Contact
                </a>
            </nav>

            <!-- Mobile Auth Buttons -->
            <div class="pt-4 border-t mt-2">
                @auth
                    <a href="{{ Auth::user()->is_admin ? route('admin.dashboard') : route('dashboard') }}"
                       class="block px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-100 rounded">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-100 rounded">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="block px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-100 rounded">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="block px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-100 rounded">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>

<script>
    const toggleBtn = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    toggleBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
