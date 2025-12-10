@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Books List</h2>

    <a href="{{ route('admin.books.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Add Book</a>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border">Title</th>
                <th class="py-2 px-4 border">Author</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td class="py-2 px-4 border">{{ $book->title }}</td>
                <td class="py-2 px-4 border">{{ $book->author }}</td>
                <td class="py-2 px-4 border">
                    <a href="{{ route('admin.books.edit', $book) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 ml-2" onclick="return confirm('Delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
