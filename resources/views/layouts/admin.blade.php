<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

    <div class="min-h-screen flex flex-col">
        <header class="bg-white shadow-md">
            <div class="container mx-auto flex justify-between items-center px-4 py-3">
                <h1 class="text-2xl font-bold text-blue-700"> Admin Panel</h1>
                
                <nav class="space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                    <a href="{{ route('admin.books.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Books</a>
                    <a href="{{ route('admin.books.create') }}" class="text-gray-700 hover:text-blue-600 font-medium">Add Book</a>
                    <a href="{{ route('admin.borrowers.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Borrowers</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium ml-2">Logout</button>
                    </form>
                </nav>
            </div>
        </header>

        <main class="flex-1 container mx-auto px-4 py-8">
            @yield('content')
        </main>

        <footer class="bg-white p-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Library System. All rights reserved.
        </footer>
    </div>

</body>
</html>
