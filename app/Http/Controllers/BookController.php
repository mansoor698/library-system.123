<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\BorrowRecord;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Book::query();

        if ($search) {
            $query->where('title', 'like', "%$search%")
                  ->orWhere('author', 'like', "%$search%");
        }

        $books = $query->paginate(5)->withQueryString();

        return view('books.index', [
            'books' => $books,
            'search' => $search,
        ]);
    }

    public function borrow(Book $book)
    {
        if ($book->available_copies <= 0) {
            return back()->with('error', 'Book is not available for borrowing.');
        }

        // Decrease available copies
        $book->decrement('available_copies');

        // Create a borrow record
        BorrowRecord::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);

        return back()->with('success', 'Book borrowed successfully.');
    }
}
