@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-xl p-6 sm:p-8">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 border-b pb-3">Borrower Details</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700 text-base">
            <div>
                <p class="font-semibold">Name:</p>
                <p>{{ $borrowRecord->user->name }}</p>
            </div>

            <div>
                <p class="font-semibold">Email:</p>
                <p>{{ $borrowRecord->user->email }}</p>
            </div>

            <div>
                <p class="font-semibold">Borrowed Book:</p>
                <p>{{ $borrowRecord->book->title }}</p>
            </div>

            <div>
                <p class="font-semibold">Borrow Date:</p>
                <p>{{ $borrowRecord->borrowed_at->format('d M Y') }}</p>
            </div>

            <div>
                <p class="font-semibold">Due Date:</p>
                <p>
                    {{ $borrowRecord->due_date ? $borrowRecord->due_date->format('d M Y') : 'Not Set' }}
                </p>
            </div>

            <div>
                <p class="font-semibold">Return Date:</p>
                <p>
                    {{ $borrowRecord->returned_at ? $borrowRecord->returned_at->format('d M Y') : 'Not Returned Yet' }}
                </p>
            </div>

            <div class="sm:col-span-2">
                <p class="font-semibold">Status:</p>
                <p>
                    @if($borrowRecord->returned_at)
                        <span class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Returned</span>
                    @else
                        <span class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Not Returned</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('admin.borrowers.index') }}"
               class="inline-flex items-center px-5 py-2.5 bg-gray-800 text-white text-sm font-medium rounded hover:bg-gray-900 transition">
                ← Back to Borrowers List
            </a>
        </div>
    </div>
</div>
@endsection
