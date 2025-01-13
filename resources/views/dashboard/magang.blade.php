@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Magang</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Pengisian Jurnal</div>
                <div class="card-body">
                    <a href="{{ route('journals.create') }}" class="btn btn-primary">Tambah Jurnal</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Rangkuman Kegiatan</div>
                <div class="card-body">
                    <a href="{{ route('journals.index') }}" class="btn btn-primary">Lihat Rangkuman</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection