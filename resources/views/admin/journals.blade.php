@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h2>Rangkuman Kegiatan Magang</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>

    @if(!request('user_id'))
    <div class="card mb-4">
        <div class="card-header">
            Daftar Anak Magang
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jumlah Jurnal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->journals_count }} jurnal</td>
                            <td>
                                <a href="{{ route('magang.journals', ['user_id' => $user->id]) }}" 
                                   class="btn btn-sm btn-info">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data anak magang</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Jurnal Kegiatan: {{ $selectedUser->name }}</span>
            <a href="{{ route('magang.journals') }}" class="btn btn-sm btn-secondary">
                Kembali ke Daftar
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aktivitas</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($journals as $journal)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($journal->tanggal)->format('d/m/Y') }}</td>
                            <td>{{ $journal->waktu_mulai }} - {{ $journal->waktu_selesai }}</td>
                            <td>
                                <span class="badge bg-{{ $journal->status === 'hadir' ? 'success' : ($journal->status === 'izin' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($journal->status) }}
                                </span>
                            </td>
                            <td>{{ $journal->aktivitas }}</td>
                            <td>{{ $journal->alasan ?: '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada jurnal kegiatan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection