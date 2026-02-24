@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')
<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-0">Kelola User</h4>
            <small class="text-muted">Manajemen keanggotaan perpustakaan</small>
        </div>

        @if (Auth::user()->role == 'admin')
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                + Tambah User
            </a>
        @endif
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>NIS</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->school_id }}</td>
                            <td>{{ $user->major }}</td>
                            <td>{{ $user->class }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role == 'admin' ? 'primary' : 'success' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                @if (Auth::id() != $user->id)
                                    <form action="{{ route('users.destroy', $user->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Tidak ada data user
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection