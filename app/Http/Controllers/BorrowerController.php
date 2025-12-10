<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrow::with(['user', 'book'])->get();
        return view('borrowers', compact('borrowers'));
    }
}
