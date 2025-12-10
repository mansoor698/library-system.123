<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Library System') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

    <!-- Google Font - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Custom Font Style -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-sky-100 via-white to-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <x-navbar />

    <!-- Header Section (Optional) -->
    @hasSection('header')
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>
    @endif

    <!-- Main Content -->
    <main class="flex-grow py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-gray-300 mt-12">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8 text-sm">
            <div>
                <h2 class="text-xl font-semibold text-white mb-2">Library System</h2>
                <p class="mb-4">A simple way to manage and borrow books online.</p>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6...z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12...z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-3">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('dashboard') }}" class="hover:text-white">Dashboard</a></li>
                    <li><a href="{{ route('books.index') }}" class="hover:text-white">Books</a></li>
                    <li><a href="{{ route('profile.edit') }}" class="hover:text-white">Profile</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-3">Resources</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Help</a></li>
                    <li><a href="#" class="hover:text-white">Borrowing Rules</a></li>
                    <li><a href="#" class="hover:text-white">Privacy</a></li>
                    <li><a href="#" class="hover:text-white">Terms</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-3">Contact</h3>
                <p>Email: <a href="mailto:mansooritwork92@gmail.com" class="text-blue-300 hover:text-white">mansooritwork92@gmail.com</a></p>
                <p>Phone: <a href="tel:+923159308708" class="text-blue-300 hover:text-white">0315 9308708</a></p>
                <p>Address: Lundkhwar, Mardan</p>
            </div>
        </div>

        <div class="border-t border-blue-700 text-center py-4 text-sm text-blue-200">
            &copy; {{ date('Y') }} Library System. All rights reserved.
        </div>
    </footer>

</body>

</html>
