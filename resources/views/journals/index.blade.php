@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Rangkuman Kegiatan</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('journals.create') }}" class="btn btn-primary mb-3">Tambah Jurnal</a>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Aktivitas</th>
                                    <th>Status</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($journals->count() > 0)
                                    @foreach($journals as $index => $journal)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $journal->tanggal }}</td>
                                        <td>{{ $journal->waktu_mulai }}</td>
                                        <td>{{ $journal->waktu_selesai }}</td>
                                        <td>{{ $journal->aktivitas }}</td>
                                        <td>{{ $journal->status }}</td>
                                        <td>{{ $journal->alasan }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection