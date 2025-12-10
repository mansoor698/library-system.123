<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class Borrow extends Model
{
    
    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
