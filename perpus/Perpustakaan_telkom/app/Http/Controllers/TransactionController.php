<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['book', 'user'])
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }


    public function create()
    {
        // Ambil hanya buku yang belum dipinjam
        $books = Book::where('is_borrowed', false)->get();

        // Ambil semua user
        $users = User::all();

        return view('transactions.create', compact('books', 'users'));
    }

    //menyimpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'book_id'     => 'required|exists:books,id',
            'user_id'     => 'required|exists:users,id',
            'borrowed_at' => 'required|date',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Cegah jika buku sudah dipinjam
        if ($book->is_borrowed) {
            return back()->with('error', 'Buku sedang dipinjam');
        }

        Transaction::create([
            'book_id'     => $request->book_id,
            'user_id'     => $request->user_id,
            'borrowed_at' => $request->borrowed_at,
            'status'      => 'borrowed',
        ]);

        // Update status buku
        $book->update([
            'is_borrowed' => true,
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil dibuat');
    }

    //Pengembalian buku
    public function returnBook(Transaction $transaction)
    {
        // Jika sudah dikembalikan
        if ($transaction->status === 'returned') {
            return back()->with('error', 'Buku sudah dikembalikan');
        }

        // Update transaksi
        $transaction->update([
            'returned_at' => now(),
            'status'      => 'returned',
        ]);

        // Update status buku
        $transaction->book->update([
            'is_borrowed' => false,
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Buku berhasil dikembalikan');
    }
    
    public function destroy(Transaction $transaction)
    {
        // Jika transaksi masih dipinjam, kembalikan dulu bukunya
        if ($transaction->status === 'borrowed') {
            $transaction->book->update([
                'is_borrowed' => false,
            ]);
        }

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}