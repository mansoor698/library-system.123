<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $books = Book::latest()->take(5)->get(); // latest 5 books
        return view('welcome', compact('books'));
    }
}
