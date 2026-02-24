<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_code', 'title', 'author',
        'publisher', 'year', 'is_borrowed'
    ];
    public function transaction()
    {
        return $this->hasOne(Transaction::class)
            ->where('status', 'borrowed');
    }
}