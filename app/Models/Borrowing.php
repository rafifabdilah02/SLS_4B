<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    // Mengizinkan ketiga kolom ini diisi secara otomatis lewat kode
    protected $fillable = ['user_id', 'book_id', 'status'];

    // Relasi: Peminjaman ini milik 1 User (Member)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Peminjaman ini menempel pada 1 Buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}