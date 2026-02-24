@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-0">Tambah User</h4>
            <small class="text-muted">Buat akun & keanggotaan perpustakaan</small>
        </div>

        <button form="form-user" type="submit" class="btn btn-primary btn-sm">
            Simpan
        </button>
    </div>

    {{-- Form --}}
    <div class="card">
        <div class="card-body">
            <form id="form-user" action="{{ route('users.store') }}" method="POST">
                @csrf

                {{-- NIS --}}
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text"
                           name="school_id"
                           class="form-control"
                           value="{{ old('school_id') }}"
                           placeholder="9 digit">
                    @error('school_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jurusan --}}
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text"
                           name="major"
                           class="form-control"
                           value="{{ old('major') }}"
                           placeholder="RPL / TKJ / DKV">
                    @error('major')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kelas --}}
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text"
                           name="class"
                           class="form-control"
                           value="{{ old('class') }}"
                           placeholder="XII RPL 1">
                    @error('class')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           value="{{ old('username') }}">
                    @error('username')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option value="member" selected>Member</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

            </form>
        </div>
    </div>

</div>
@endsection