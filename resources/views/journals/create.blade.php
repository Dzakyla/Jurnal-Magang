@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jurnal Kegiatan</h2>
    <form action="{{ route('journals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Aktivitas</label>
            <textarea name="aktivitas" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alasan</label>
            <textarea name="alasan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@push('scripts')
<script>
document.getElementById('status').addEventListener('change', function() {
    const alasanGroup = document.getElementById('alasan-group');
    if (this.value === 'izin' || this.value === 'sakit') {
        alasanGroup.style.display = 'block';
    } else {
        alasanGroup.style.display = 'none';
    }
});
</script>
@endpush
@endsection