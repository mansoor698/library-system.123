@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-8 tracking-tight">Available Books</h1>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

   {{-- Search Bar --}}
<form method="GET" action="{{ route('books.index') }}" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 mb-8">
    <input 
        type="text" 
        name="search" 
        value="{{ request('search') }}"
        placeholder="Search books by title or author"
        class="w-64 border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
    >

    <button type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200">
        Search
    </button>
</form>

    </form>

    {{-- Books Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($books as $book)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg p-6 flex flex-col justify-between transition duration-300">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1 truncate">{{ $book->title }}</h2>
                    <p class="text-sm text-gray-600 mb-1"><span class="font-semibold">Author:</span> {{ $book->author }}</p>
                    <p class="text-sm text-gray-600 mb-4"><span class="font-semibold">Available:</span> {{ $book->available_copies }}</p>
                </div>

                <div>
                    @if($book->available_copies > 0)
                        <button
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold transition"
                            onclick="openModal({{ $book->id }}, '{{ addslashes($book->title) }}', '{{ addslashes($book->author) }}', {{ $book->available_copies }})">
                            Borrow Now
                        </button>
                    @else
                        <div class="text-center text-red-600 font-semibold mt-2">Currently Unavailable</div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 text-lg mt-10">
                No books found.
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $books->links() }}
    </div>
</div>

{{-- Confirmation Modal --}}
<div id="borrowModal" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50 transition duration-300">
    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md relative">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Confirm Borrow</h2>
        <p class="text-gray-700 mb-2"><strong>Title:</strong> <span id="modalTitle" class="font-medium"></span></p>
        <p class="text-gray-700 mb-2"><strong>Author:</strong> <span id="modalAuthor" class="font-medium"></span></p>
        <p class="text-gray-700 mb-6"><strong>Available Copies:</strong> <span id="modalCopies" class="font-medium"></span></p>

        <form id="borrowForm" method="POST" action="">
            @csrf
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md font-medium">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium">
                    Confirm Borrow
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Script --}}
<script>
    function openModal(bookId, title, author, copies) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalAuthor').innerText = author;
        document.getElementById('modalCopies').innerText = copies;
        document.getElementById('borrowForm').action = `/books/${bookId}/borrow`;

        const modal = document.getElementById('borrowModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        const modal = document.getElementById('borrowModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endsection
