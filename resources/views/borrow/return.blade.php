<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Return Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-center mb-6">Return a Book</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('borrow.return') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Borrowed Book</label>
                <select name="borrow_record_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select a record</option>
                    @foreach ($activeBorrows as $record)
                        <option value="{{ $record->id }}">
                            {{ $record->book->title }} — {{ $record->borrower->name }} (Due: {{ \Carbon\Carbon::parse($record->due_date)->format('M d, Y') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Return Date</label>
                <input
                    type="date"
                    name="return_date"
                    class="w-full border rounded px-3 py-2"
                    value="{{ now()->toDateString() }}"
                    required
                >
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
                Submit Return
            </button>
        </form>
    </div>
</body>
</html>
