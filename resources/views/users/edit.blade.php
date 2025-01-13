@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h2>Edit User</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control @error('role') is-invalid @enderror" 
                            id="role" name="role" required>
                        <option value="">Pilih Role</option>
                        <option value="magang" {{ (old('role', $user->role) === 'magang') ? 'selected' : '' }}>Magang</option>
                        <option value="admin" {{ (old('role', $user->role) === 'admin') ? 'selected' : '' }}>Admin</option>
                        <option value="super_admin" {{ (old('role', $user->role) === 'super_admin') ? 'selected' : '' }}>Super Admin</option>
                    </select>
                    @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection