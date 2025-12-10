<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowRecord;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowRecords = BorrowRecord::with(['user', 'book'])->latest()->get();
        return view('admin.borrowers.index', compact('borrowRecords'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $books = Book::where('available_copies', '>', 0)->orderBy('title')->get();

        return view('admin.borrowers.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'book_id'     => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_date'    => 'nullable|date|after_or_equal:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        DB::transaction(function () use ($request) {
            $isReturnedNow = !is_null($request->input('returned_at'));

            $book = Book::lockForUpdate()->findOrFail($request->book_id);

            if (!$isReturnedNow) {
                if ($book->available_copies <= 0) {
                    throw ValidationException::withMessages([
                        'book_id' => 'No copies available for this book.',
                    ]);
                }
                $book->decrement('available_copies');
            }

            BorrowRecord::create($request->only([
                'user_id', 'book_id', 'borrowed_at', 'due_date', 'returned_at'
            ]));
        });

        return redirect()->route('admin.borrowers.index')->with('success', 'Borrow record created successfully.');
    }

    public function show($id)
    {
        $borrowRecord = BorrowRecord::with(['user', 'book'])->findOrFail($id);
        return view('admin.borrowers.show', compact('borrowRecord'));
    }

    public function edit($id)
    {
        $record = BorrowRecord::findOrFail($id);
        $users  = User::orderBy('name')->get();
        $books  = Book::orderBy('title')->get();

        return view('admin.borrowers.edit', compact('record', 'users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'book_id'     => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_date'    => 'nullable|date|after_or_equal:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        DB::transaction(function () use ($request, $id) {
            $record = BorrowRecord::lockForUpdate()->findOrFail($id);

            $oldBookId    = $record->book_id;
            $wasReturned  = !is_null($record->returned_at);

            $newBookId    = (int) $request->book_id;
            $isReturned   = !is_null($request->returned_at);

            if ($oldBookId !== $newBookId) {
                if (!$wasReturned) {
                    $oldBook = Book::lockForUpdate()->findOrFail($oldBookId);
                    $oldBook->increment('available_copies');
                }

                if (!$isReturned) {
                    $newBook = Book::lockForUpdate()->findOrFail($newBookId);
                    if ($newBook->available_copies <= 0) {
                        throw ValidationException::withMessages([
                            'book_id' => 'No copies available for the selected book.',
                        ]);
                    }
                    $newBook->decrement('available_copies');
                }
            } else {
                $sameBook = Book::lockForUpdate()->findOrFail($oldBookId);

                if (!$wasReturned && $isReturned) {
                    $sameBook->increment('available_copies');
                }

                if ($wasReturned && !$isReturned) {
                    if ($sameBook->available_copies <= 0) {
                        throw ValidationException::withMessages([
                            'book_id' => 'No copies available for this book.',
                        ]);
                    }
                    $sameBook->decrement('available_copies');
                }
            }

            $record->update($request->only([
                'user_id', 'book_id', 'borrowed_at', 'due_date', 'returned_at'
            ]));
        });

        return redirect()->route('admin.borrowers.index')->with('success', 'Borrow record updated successfully.');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $record = BorrowRecord::lockForUpdate()->findOrFail($id);

            if (is_null($record->returned_at)) {
                $book = Book::lockForUpdate()->findOrFail($record->book_id);
                $book->increment('available_copies');
            }

            $record->delete();
        });

        return redirect()->route('admin.borrowers.index')->with('success', 'Borrow record deleted successfully.');
    }
}
