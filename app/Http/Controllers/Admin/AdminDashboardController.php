<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\BorrowRecord; // change to your actual model name if different

class AdminDashboardController extends Controller
{
    public function index()
    {
        $booksCount = Book::count();
        $usersCount = User::count();
        $borrowersCount = BorrowRecord::count(); // Update if your model is Borrower or something else
        $latestBooks = Book::latest()->take(5)->get();

        return view('admin.dashboard', compact('booksCount', 'usersCount', 'borrowersCount', 'latestBooks'));
    }
}
