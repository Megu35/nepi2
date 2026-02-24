@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container my-4">

    {{-- Header --}}
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Edit Buku</h4>
                <small class="text-muted">Perbarui data buku di sistem</small>
            </div>

            <button type="submit" form="form-book" class="btn btn-primary btn-sm">
                Update
            </button>
        </div>
    </div>

    {{-- Form --}}
    <div class="card">
        <div class="card-body">
            <form id="form-book"
                action="{{ route('books.update', $book->id) }}"
                method="POST">
                @csrf
                @method('PUT')

                {{-- Kode Buku --}}
                <div class="mb-3">
                    <label class="form-label">Kode Buku</label>
                    <input type="text"
                        name="book_code"
                        value="{{ old('book_code', $book->book_code) }}"
                        class="form-control @error('book_code') is-invalid @enderror"
                        placeholder="AA456">
                    @error('book_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Judul --}}
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text"
                        name="title"
                        value="{{ old('title', $book->title) }}"
                        class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Penulis --}}
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text"
                        name="author"
                        value="{{ old('author', $book->author) }}"
                        class="form-control @error('author') is-invalid @enderror">
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Penerbit --}}
                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text"
                        name="publisher"
                        value="{{ old('publisher', $book->publisher) }}"
                        class="form-control @error('publisher') is-invalid @enderror">
                    @error('publisher')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tahun --}}
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number"
                        name="year"
                        value="{{ old('year', $book->year) }}"
                        class="form-control @error('year') is-invalid @enderror">
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
