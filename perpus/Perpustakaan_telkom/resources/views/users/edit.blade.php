@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-0">Edit User</h4>
            <small class="text-muted">Perbarui data pengguna</small>
        </div>

        <button form="form-user" type="submit" class="btn btn-primary btn-sm">
            Update
        </button>
    </div>

    {{-- Form --}}
    <div class="card">
        <div class="card-body">
            <form id="form-user"
                  action="{{ route('users.update', $user->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- Username --}}
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           value="{{ old('username', $user->username) }}">
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
                           value="{{ old('name', $user->name) }}">
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
                           value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NIS --}}
                <div class="mb-3">
                    <label class="form-label">NIS / School ID</label>
                    <input type="text"
                           name="school_id"
                           class="form-control"
                           value="{{ old('school_id', $user->school_id) }}">
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
                           value="{{ old('major', $user->major) }}">
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
                           value="{{ old('class', $user->class) }}">
                    @error('class')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengubah password
                    </small>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

            </form>
        </div>
    </div>

</div>
@endsection