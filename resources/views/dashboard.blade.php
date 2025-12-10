@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="bg-white shadow rounded-lg p-6 mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Welcome, {{ Auth::user()->name }}</h1>
            <p class="text-gray-600">Manage your profile and borrowed books below.</p>
        </div>
        <a href="{{ route('profile.edit') }}"
   class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-100 transition">
    Edit Profile
</a>

    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Your Borrowed Books</h2>

        @if($borrowedBooks->isEmpty())
            <p class="text-gray-600">You haven’t borrowed any books yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Book Title</th>
                            <th class="px-4 py-2 border">Borrowed At</th>
                            <th class="px-4 py-2 border">Due Date</th>
                            <th class="px-4 py-2 border">Returned At</th>
                            <th class="px-4 py-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowedBooks as $index => $record)
                            <tr class="border-t">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $record->book->title }}</td>
                                <td class="px-4 py-2 border">{{ $record->borrowed_at->format('d M, Y') }}</td>
                                <td class="px-4 py-2 border">{{ $record->due_date ? $record->due_date->format('d M, Y') : '-' }}</td>
                                <td class="px-4 py-2 border">
                                    {{ $record->returned_at ? $record->returned_at->format('d M, Y') : 'Not Returned' }}
                                </td>
                                <td class="px-4 py-2 border">
                                    @if($record->returned_at)
                                        <span class="text-green-600 font-semibold">Returned</span>
                                    @elseif($record->due_date && $record->due_date->isPast())
                                        <span class="text-red-600 font-semibold">Overdue</span>
                                    @else
                                        <span class="text-yellow-600 font-semibold">Borrowed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection
