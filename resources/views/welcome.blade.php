<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Public Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    @include('components.navbar')

    <!-- Welcome Section -->
    <section class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">Welcome to the Library System</h1>
            <p class="text-lg text-gray-600 mb-8">
                Easily browse books, borrow what you like, and stay organized — all in one place.
            </p>

            @guest
                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg text-lg hover:bg-blue-700 shadow-md">Login</a>
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-white border border-gray-300 text-gray-800 rounded-lg text-lg hover:bg-gray-100 shadow-sm">Register</a>
                </div>
            @endguest

            @auth
                <div class="mt-6 text-gray-700">
                    Logged in as <span class="font-semibold text-blue-600">{{ auth()->user()->is_admin ? 'Admin' : 'User' }}</span>
                </div>
            @endauth
        </div>
    </section>

    @auth
    <!-- Recently Added Books -->
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-white border border-gray-200 rounded-2xl shadow overflow-hidden">
                <div class="px-6 py-5 bg-blue-50 border-b border-blue-100">
                    <h2 class="text-2xl font-semibold text-blue-800">Recently Added Books</h2>
                </div>

                <div class="overflow-x-auto">
                    @if($books->count())
                        <table class="min-w-full text-sm text-left">
                            <thead class="bg-blue-100 text-blue-900 uppercase text-xs font-semibold">
                                <tr>
                                    <th class="px-6 py-3">#</th>
                                    <th class="px-6 py-3">Title</th>
                                    <th class="px-6 py-3">Author</th>
                                    <th class="px-6 py-3">Added On</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($books as $index => $book)
                                    <tr class="hover:bg-blue-50">
                                        <td class="px-6 py-3">{{ $index + 1 }}</td>
                                        <td class="px-6 py-3 font-medium text-gray-900">{{ $book->title }}</td>
                                        <td class="px-6 py-3">{{ $book->author }}</td>
                                        <td class="px-6 py-3 text-gray-600">{{ $book->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-5 text-center text-gray-500">No books available at the moment.</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endauth

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
