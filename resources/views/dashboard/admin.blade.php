@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Data Anak Magang</div>
                <div class="card-body">
                    <a href="{{ route('magang.users') }}" class="btn btn-primary">Lihat Data Anak Magang</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Rangkuman Kegiatan Magang</div>
                <div class="card-body">
                    <a href="{{ route('magang.journals') }}" class="btn btn-primary">Lihat Rangkuman Kegiatan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection