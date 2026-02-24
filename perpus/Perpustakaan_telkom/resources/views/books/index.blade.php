@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container my-4">

    {{-- Header --}}
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Dashboard Buku</h4>
                <small class="text-muted">Ringkasan data buku di sistem</small>
            </div>

            @if (Auth::user()->role == 'admin')
                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">
                    + Tambah Buku
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
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->year }}</td>
                            <td class="text-center">

                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('books.edit', $book->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('books.destroy', $book->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                @else
                                    @if (!$book->is_borrowed)
                                        <form method="POST"
                                              action="{{ route('transactions.borrow', $book->id) }}">
                                            @csrf
                                            <button class="btn btn-success btn-sm">
                                                Pinjam
                                            </button>
                                        </form>
                                    @else
                                        <span class="badge bg-secondary">
                                            Tidak Tersedia
                                        </span>
                                    @endif
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Tidak ada data buku
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
                        
