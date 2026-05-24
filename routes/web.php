<?php

// =========================================================================
// BAGIAN 1: IMPORT KELAS & MODEL
// =========================================================================
use Illuminate\Support\Facades\Route;       // Fungsi bawaan Laravel untuk membuat rute URL
use Illuminate\Support\Facades\Auth;        // Fungsi untuk mengambil data user yang sedang login (wajib ada)
use App\Http\Controllers\AuthController;    // Memanggil controller untuk sistem Login & Register
use App\Models\Book;                        // Memanggil tabel buku dari database
use App\Models\Borrowing;                   // Memanggil tabel peminjaman dari database

// =========================================================================
// BAGIAN 2: RUTE UMUM & AUTENTIKASI (Bebas Akses / Tanpa Login)
// =========================================================================

// Rute utama (URL awal). Jika diakses, langsung otomatis diarahkan ke halaman login.
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute untuk menampilkan halaman dan memproses Login & Register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');          
Route::post('/login', [AuthController::class, 'login']);                            
Route::get('/register', [AuthController::class, 'showRegister'])->name('register'); 
Route::post('/register', [AuthController::class, 'register']);                      
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');          

// =========================================================================
// BAGIAN 3: RUTE TERPROTEKSI (Wajib Login)
// =========================================================================
Route::middleware(['auth'])->group(function () {
    
    // ---------------------------------------------------------------------
    // FITUR MEMBER
    // ---------------------------------------------------------------------

    // PERBAIKAN: Ubah URL dari '/dashboard' menjadi '/member/dashboard'
    Route::get('/member/dashboard', function () {
        $userId = Auth::id(); 

        $pendingCount = \App\Models\Borrowing::where('user_id', $userId)->where('status', 'pending')->count();
        $issuedCount = \App\Models\Borrowing::where('user_id', $userId)->where('status', 'dipinjam')->count();
        $toReturnCount = \App\Models\Borrowing::where('user_id', $userId)->where('status', 'dipinjam')->count();
        $totalBorrowedCount = \App\Models\Borrowing::where('user_id', $userId)->count();

        $currentlyBorrowedBooks = \App\Models\Borrowing::where('user_id', $userId)
            ->where('status', 'dipinjam')
            ->with('book')
            ->get();

        return view('member.dashboard', compact(
            'pendingCount', 
            'issuedCount', 
            'toReturnCount', 
            'totalBorrowedCount',
            'currentlyBorrowedBooks'
        ));
    })->name('member.dashboard');

    // Halaman Pencarian Buku oleh Member
    Route::get('/member/search', function (Illuminate\Http\Request $request) {
        $searchQuery = $request->input('search'); // Menangkap teks yang diketik di kolom pencarian

        $books = App\Models\Book::query();
        
        // Jika user mengetik sesuatu, cari kemiripan di judul atau nama pengarang
        if ($searchQuery) {
            $books->where('title', 'like', "%{$searchQuery}%")
                  ->orWhere('author', 'like', "%{$searchQuery}%");
        }
        
        $books = $books->get(); 

        return view('member.search', compact('books', 'searchQuery'));
    })->name('member.search');

    // Proses Member melakukan peminjaman buku
    Route::post('/member/borrow/{id}', function ($id) {
        $book = Book::findOrFail($id); 

        // Jika stok buku masih ada, kurangi 1 dan catat ke tabel peminjaman
        if ($book->stock > 0) {
            $book->stock -= 1; 
            $book->save();     

            Borrowing::create([
                'user_id' => Auth::id(), 
                'book_id' => $book->id,    
                'status'  => 'dipinjam'    
            ]);
        }

        return redirect()->back(); // Kembali ke halaman sebelumnya setelah berhasil meminjam
    })->name('member.borrow');

    // ---------------------------------------------------------------------
    // FITUR ADMIN (Tidak Ada Perubahan, Tetap Seperti Sebelumnya)
    // ---------------------------------------------------------------------

    Route::get('/admin/dashboard', function () {
        $books = Book::all(); 
        $borrowings = Borrowing::with(['user', 'book'])->latest()->get(); 
        return view('admin.dashboard', compact('books', 'borrowings')); 
    })->name('admin.dashboard');

    Route::post('/admin/return/{id}', function ($id) {
        $borrowing = Borrowing::findOrFail($id); 
        if ($borrowing->status == 'dipinjam') {
            $borrowing->status = 'dikembalikan';
            $borrowing->save();
            $book = $borrowing->book; 
            $book->stock += 1;        
            $book->save();            
        }
        return redirect()->back(); 
    })->name('admin.return');

    Route::get('/admin/books/create', function () {
        return view('admin.create'); 
    })->name('admin.books.create');

    Route::post('/admin/books', function (Illuminate\Http\Request $request) {
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->stock = $request->stock;
        $book->save(); 
        return redirect()->route('admin.dashboard'); 
    })->name('admin.books.store');

    Route::get('/admin/books/{id}/edit', function ($id) {
        $book = Book::findOrFail($id); 
        return view('admin.edit', compact('book')); 
    })->name('admin.books.edit');

    Route::put('/admin/books/{id}', function (Illuminate\Http\Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->stock = $request->stock;
        $book->save(); 
        return redirect()->route('admin.dashboard');
    })->name('admin.books.update');

    Route::delete('/admin/books/{id}', function ($id) {
        $book = Book::findOrFail($id);
        $book->delete(); 
        return redirect()->route('admin.dashboard');
    })->name('admin.books.destroy');

});