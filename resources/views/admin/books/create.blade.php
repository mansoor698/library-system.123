@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Add New Book</h2>

    {{-- Error message --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.books.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Author</label>
            <input type="text" name="author" value="{{ old('author') }}" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Published Year</label>
            <input type="number" name="published_year" value="{{ old('published_year') }}" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Available Copies</label>
            <input type="number" name="available_copies" value="{{ old('available_copies') }}" required class="w-full border p-2 rounded">
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.books.index') }}" class="text-gray-600">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Book</button>
        </div>
    </form>
</div>
@endsection
