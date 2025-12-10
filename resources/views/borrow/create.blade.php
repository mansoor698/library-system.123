<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrow Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-center mb-6">Borrow a Book</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('borrow.store') }}" method="POST">
            @csrf

            {{-- Show borrower dropdown only for admin --}}
            @if(isset($borrowers))
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Borrower</label>
                    <select name="borrower_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">Select a user</option>
                        @foreach ($borrowers as $borrower)
                            <option value="{{ $borrower->id }}">{{ $borrower->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="mb-4">
                <label class="block mb-1 font-medium">Book</label>
                <select name="book_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select a book</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">
                            {{ $book->title }} ({{ $book->quantity }} available)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Due Date</label>
                <input type="date" name="due_date" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                Confirm Borrow
            </button>
        </form>
    </div>
</body>
</html>
