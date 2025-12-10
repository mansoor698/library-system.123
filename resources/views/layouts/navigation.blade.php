<nav class="bg-white border-b shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-700">Library System</a>

        <div class="space-x-6 hidden sm:flex">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 font-medium">Home</a>
            <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 font-medium">About</a>
            <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600 font-medium">Contact</a>

            @auth
                {{-- ✅ Role-based dashboard link --}}
                <a href="{{ Auth::user()->is_admin ? route('admin.dashboard') : route('dashboard') }}" 
                   class="text-gray-600 hover:text-blue-600 font-medium">
                    Dashboard
                </a>

                {{-- ✅ Show admin-only links --}}
                @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.books.index') }}" class="text-gray-600 hover:text-blue-600 font-medium">Books</a>
                    <a href="{{ route('admin.borrowers.index') }}" class="text-gray-600 hover:text-blue-600 font-medium">Borrowers</a>
                @endif

                <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-blue-600 font-medium">Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-red-500 font-medium">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium">Login</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 font-medium">Register</a>
            @endauth
        </div>
    </div>
</nav>
