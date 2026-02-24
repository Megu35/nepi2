@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container my-4">

    {{-- Header --}}
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Tambah Transaksi</h4>
                <small class="text-muted">Catat peminjaman buku</small>
            </div>

            <button type="submit" form="form-transaction" class="btn btn-primary btn-sm">
                Simpan
            </button>
        </div>
    </div>

    {{-- Form --}}
    <div class="card">
        <div class="card-body">
            <form id="form-transaction"
                action="{{ route('transactions.store') }}"
                method="POST">
                @csrf

                {{-- Buku --}}
                <div class="mb-3">
                    <label class="form-label">Buku</label>
                    <select name="book_id"
                        class="form-select @error('book_id') is-invalid @enderror">
                        <option value="">-- Pilih Buku --</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}"
                                {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Peminjam --}}
                <div class="mb-3">
                    <label class="form-label">Peminjam</label>
                    <select name="user_id"
                        class="form-select @error('user_id') is-invalid @enderror">
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal Pinjam --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date"
                        name="borrowed_at"
                        value="{{ old('borrowed_at') }}"
                        class="form-control @error('borrowed_at') is-invalid @enderror">
                    @error('borrowed_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
