<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Total books
        $booksCount = Book::count();

        // Borrowed books of the current user
        $borrowedBooks = BorrowRecord::with('book')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $borrowedCount = $borrowedBooks->count();

        // Recent books (last 5)
        $recentBooks = Book::latest()->take(5)->get();

        return view('dashboard', [
            'booksCount' => $booksCount,
            'borrowedCount' => $borrowedCount,
            'borrowedBooks' => $borrowedBooks,
            'recentBooks' => $recentBooks,
        ]);
    }
}
