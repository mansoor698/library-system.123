@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800"> Borrowed Records</h2>
        <a href="{{ route('admin.borrowers.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded shadow">
             Add Borrow Record
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">#</th>
                    <th class="px-6 py-3 text-left font-semibold">User</th>
                    <th class="px-6 py-3 text-left font-semibold">Book</th>
                    <th class="px-6 py-3 text-left font-semibold">Borrowed At</th>
                    <th class="px-6 py-3 text-left font-semibold">Due Date</th>
                    <th class="px-6 py-3 text-left font-semibold">Returned At</th>
                    <th class="px-6 py-3 text-right font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-800">
                @forelse ($borrowRecords as $record)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $record->user->name }}</td>
                        <td class="px-6 py-4">{{ $record->book->title }}</td>
                        <td class="px-6 py-4">{{ $record->borrowed_at }}</td>
                        <td class="px-6 py-4">
                            {{ $record->due_date ? \Carbon\Carbon::parse($record->due_date)->format('Y-m-d') : '-' }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($record->returned_at)
                                <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded text-xs">
                                    {{ $record->returned_at }}
                                </span>
                            @else
                                <span class="inline-block px-2 py-1 bg-red-100 text-red-800 rounded text-xs">
                                    Not Returned
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.borrowers.show', $record->id) }}"
                               class="inline-block text-green-600 hover:text-green-800 font-medium text-sm">
                                View
                            </a>

                            <a href="{{ route('admin.borrowers.edit', $record->id) }}"
                               class="inline-block text-blue-600 hover:text-blue-800 font-medium text-sm">
                                 Edit
                            </a>

                            <form action="{{ route('admin.borrowers.destroy', $record->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium text-sm">
                                     Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No borrow records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
