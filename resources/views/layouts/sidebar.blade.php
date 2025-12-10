<!-- Sidebar Navigation for Admin -->
<aside class="w-64 bg-gray-800 text-white min-h-screen p-6">
    <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
    <nav class="space-y-3">
        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
        <a href="{{ route('admin.books.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Books</a>
        <a href="{{ route('admin.borrowers.index') }}" class="block py-2 px-4 rounded bg-gray-700">Borrowers</a>
    </nav>
</aside>
