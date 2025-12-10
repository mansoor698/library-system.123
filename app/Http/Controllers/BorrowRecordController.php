<?php


namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowRecordController extends Controller
{
    public function store($bookId)
    {
        $book = Book::findOrFail($bookId);

        if ($book->available_copies <= 0) {
            return back()->with('error', 'No copies available for this book.');
        }

        // Check if already borrowed
        $already = BorrowRecord::where('user_id', Auth::id())
            ->where('book_id', $bookId)
            ->whereNull('returned_at')
            ->first();

        if ($already) {
            return back()->with('error', 'You have already borrowed this book.');
        }

        BorrowRecord::create([
            'user_id'     => Auth::id(),
            'book_id'     => $bookId,
            'borrowed_at' => now(),
        ]);

        $book->decrement('available_copies');

        return back()->with('success', 'Book borrowed successfully.');
    }
}
