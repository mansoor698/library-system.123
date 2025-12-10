@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-4xl font-bold text-blue-800 mb-10">Admin Dashboard</h1>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        {{-- Total Books --}}
        <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <p class="text-sm uppercase font-semibold tracking-wide">Total Books</p>
            <p class="text-5xl font-bold mt-2">{{ $booksCount }}</p>
        </div>

        {{-- Total Users --}}
        <div class="bg-gradient-to-r from-green-400 to-green-600 text-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <p class="text-sm uppercase font-semibold tracking-wide">Total Users</p>
            <p class="text-5xl font-bold mt-2">{{ $usersCount }}</p>
        </div>

        {{-- Total Borrowers --}}
        <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
            <p class="text-sm uppercase font-semibold tracking-wide">Total Borrow Records</p>
            <p class="text-5xl font-bold mt-2">{{ $borrowersCount }}</p>
        </div>
    </div>

    {{-- Section Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <h2 class="text-2xl font-semibold text-gray-800">Latest Books</h2>

        <div class="flex gap-3">
            <a href="{{ route('admin.books.index') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                 Book List
            </a>

            <a href="{{ route('admin.books.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                Add New Book
            </a>
        </div>
    </div>

    {{-- Books Table --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 border-b text-gray-600">
                <tr>
                    <th class="px-6 py-3 font-medium uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 font-medium uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 font-medium uppercase tracking-wider">Published Year</th>
                    <th class="px-6 py-3 font-medium uppercase tracking-wider">Added On</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($latestBooks as $book)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $book->title }}</td>
                        <td class="px-6 py-4">{{ $book->author }}</td>
                        <td class="px-6 py-4">{{ $book->published_year ?? '—' }}</td>
                        <td class="px-6 py-4">{{ $book->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-400 italic">
                            No books found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
