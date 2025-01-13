@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Super Admin</h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><b>Manajemen User</b></div>
                <div class="card-body">
                    <p class="card-text">Kelola semua user termasuk admin dan anak magang.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Lihat Semua User</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Tambah user baru dengan role tertentu.</p>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection