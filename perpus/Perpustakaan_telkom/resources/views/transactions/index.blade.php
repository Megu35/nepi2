@extends('layouts.app')

@section('title', 'Dashboard Transaksi')

@section('content')
<div class="container my-4">

    {{-- Header --}}
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Dashboard Transaksi</h4>
                <small class="text-muted">Data peminjaman & pengembalian buku</small>
            </div>

            @if (Auth::user()->role == 'admin')
                <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm">
                    Tambah Transaksi
                </a>
            @endif
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        @if (Auth::user()->role == 'admin')
                            <th>Peminjam</th>
                        @endif
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            {{-- Buku --}}
                            <td>{{ $transaction->book->book_code }}</td>
                            <td>{{ $transaction->book->title }}</td>

                            {{-- Peminjam --}}
                            @if (Auth::user()->role == 'admin')
                                <td>{{ $transaction->user->name }}</td>
                            @endif

                            {{-- Tanggal --}}
                            <td>{{ $transaction->borrowed_at->format('d M Y') }}</td>
                            <td>
                                {{ $transaction->returned_at
                                    ? $transaction->returned_at->format('d M Y')
                                    : '-' }}
                            </td>

                            {{-- Status --}}
                            <td class="text-center">
                                @if ($transaction->status === 'borrowed')
                                    <span class="badge bg-warning text-dark">
                                        Dipinjam
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        Dikembalikan
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="text-center">
                                @if ($transaction->status === 'borrowed')
                                    <form action="{{ route('transactions.return', $transaction->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">
                                            Kembalikan
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Tidak ada data transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection