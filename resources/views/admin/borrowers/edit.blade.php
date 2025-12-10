@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-10 tracking-tight">Edit Borrow Record</h2>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.borrowers.update', $record->id) }}" method="POST" class="bg-white shadow-xl rounded-2xl p-10 space-y-6">
        @csrf
        @method('PUT')

        {{-- User Selection --}}
        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">Select User</label>
            <select name="user_id" id="user_id" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $record->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Book Selection --}}
        <div>
            <label for="book_id" class="block text-sm font-medium text-gray-700 mb-1">Select Book</label>
            <select name="book_id" id="book_id" class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $record->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Borrowed At --}}
        <div>
            <label for="borrowed_at" class="block text-sm font-medium text-gray-700 mb-1">Borrowed Date</label>
            <input type="date" name="borrowed_at" id="borrowed_at"
                   value="{{ old('borrowed_at', \Carbon\Carbon::parse($record->borrowed_at)->format('Y-m-d')) }}"
                   class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
        </div>

        {{-- Returned At --}}
        <div>
            <label for="returned_at" class="block text-sm font-medium text-gray-700 mb-1">Returned Date</label>
            <input type="date" name="returned_at" id="returned_at"
                   value="{{ old('returned_at', $record->returned_at ? \Carbon\Carbon::parse($record->returned_at)->format('Y-m-d') : '') }}"
                   class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
        </div>

        {{-- Due Date --}}
        <div>
            <label for="due_date" class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
            <input type="date" name="due_date" id="due_date"
                   value="{{ old('due_date', $record->due_date ? \Carbon\Carbon::parse($record->due_date)->format('Y-m-d') : '') }}"
                   class="w-full border border-gray-300 rounded-md px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
        </div>

        {{-- Action Buttons --}}
        <div class="flex items-center justify-start pt-4 space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-2.5 rounded-md transition duration-200 shadow-md">
                Update Record
            </button>
            <a href="{{ route('admin.borrowers.index') }}" class="text-sm text-gray-600 hover:text-blue-600 underline">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
