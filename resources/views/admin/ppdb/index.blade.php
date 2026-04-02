@extends('layouts.admin')

@section('title', 'Kelola PPDB')

@section('content')

<section class="ppdb-section py-4">
    <div class="container-fluid">
        <h1 class="ppdb-title mb-4">PPDB</h1>

        <div class="ppdb-form shadow-sm mb-5 p-4 bg-white rounded-4">
            <div class="mb-4">
                <label class="form-ujian-title">Kelola Jadwal Ujian</label>
                <select id="pilihJenisUjian" class="form-select auth-input-lg" onchange="tampilkanForm()">
                    <option value="" selected disabled>Pilih jenis ujian</option>
                    <option value="akademik">Tes Akademik</option>
                    <option value="praktik">Tes Praktik</option>
                </select>
            </div>

            @php
                $forms = [
                    'akademik' => 'Jadwal Tes Akademik',
                    'praktik' => 'Jadwal Tes Praktik'
                ];
            @endphp

            @foreach($forms as $id => $title)
            <div id="form{{ ucfirst($id) }}" class="form-jadwal-container d-none border rounded p-4 bg-light">
                <h5 class="fw-bold text-start border-bottom pb-2 mb-4">{{ $title }}</h5>
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="fw-bold small mb-1">Lokasi</label>
                            <select name="lokasi" class="form-select">
                                <option selected disabled>Pilih Lokasi</option>
                                <option value="Gedung A">Gedung A</option>
                                <option value="Gedung B">Gedung B</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="fw-bold small mb-1">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small mb-1">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small mb-1">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn-submit mt-4">Simpan Jadwal</button>
                </form>
            </div>
            @endforeach
        </div>

        <div class="card border-0 shadow-sm mb-5" style="border-radius: 15px;">
            <div class="card-body p-4">
                <label class="form-ujian-title">Data Jadwal Ujian</label>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead>
                            <tr class="table-green-header">
                                <th style="width: 50px; border-radius: 10px 0 0 0;">No</th>
                                <th>Jenis Ujian</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th style="border-radius: 0 10px 0 0;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $jadwalUjian = [
                                    ['no' => 1, 'jenis' => 'Tes Akademik', 'lokasi' => 'Gedung A', 'tgl' => '20-03-2026', 'jam' => '08:00 - 12:30'],
                                    ['no' => 2, 'jenis' => 'Tes Praktik', 'lokasi' => 'Gedung B', 'tgl' => '21-03-2026', 'jam' => '08:00 - 12:30'],
                                ];
                            @endphp
                            @foreach($jadwalUjian as $j)
                            <tr>
                                <td>{{ $j['no'] }}</td>
                                <td>{{ $j['jenis'] }}</td>
                                <td>{{ $j['lokasi'] }}</td>
                                <td>{{ $j['tgl'] }}</td>
                                <td>{{ $j['jam'] }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn-icon edit" data-bs-toggle="modal" data-bs-target="#modalEditJadwal">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn-icon delete" data-bs-toggle="modal" data-bs-target="#modalHapusJadwal">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-5" style="border-radius: 15px;">
            <div class="card-body p-4">
                <label class="form-ujian-title">Data Pendaftar</label>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead>
                            <tr class="table-green-header">
                                <th style="width: 50px; border-radius: 10px 0 0 0;">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Berkas</th>
                                <th>Administratif</th>
                                <th>Tes Kompetensi</th>
                                <th style="border-radius: 0 10px 0 0;">Status Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendaftar_list as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-start ps-3">{{ $row['nama_lengkap'] }}</td>
                                <td>{{ $row['nisn'] }}</td>
                                <td>
                                    <a href="{{ route('admin.ppdb.detail', ['id' => $row['id']]) }}" class="btn-cek-berkas">Cek Berkas</a>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm status-select-custom {{ isset($row['data_pendaftar']['status']) ? 'bg-'.strtolower(str_replace(' ', '', $row['data_pendaftar']['status'])) : '' }}" 
                                            onchange="updateStatus(this, {{ $row['id'] }})">
                                        <option value="Pending" {{ (isset($row['data_pendaftar']['status']) && $row['data_pendaftar']['status'] == 'Pending') ? 'selected' : '' }}>Pending</option>
                                        <option value="Terverifikasi" {{ (isset($row['data_pendaftar']['status']) && $row['data_pendaftar']['status'] == 'Terverifikasi') ? 'selected' : '' }}>Lulus</option>
                                        <option value="Ditolak" {{ (isset($row['data_pendaftar']['status']) && $row['data_pendaftar']['status'] == 'Ditolak') ? 'selected' : '' }}>Tidak Lulus</option>
                                    </select>
                                </td>
                                <td>
                                    {{-- Placeholder untuk Kompetensi & Status Peserta --}}
                                    <span class="badge bg-secondary">N/A</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">N/A</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

@vite(['resources/js/app.js'])

<script>
async function updateStatus(select, id) {
    const status = select.value;
    
    // Visual feedback
    select.disabled = true;
    
    try {
        const response = await axios.put(`/admin/ppdb/pendaftar/${id}/status`, {
            status: status
        });
        
        if (response.data.success) {
            // Update color based on status
            select.classList.remove('bg-pending', 'bg-terverifikasi', 'bg-ditolak', 'bg-lulus', 'bg-tidak');
            if (status === 'Terverifikasi') select.classList.add('bg-lulus');
            else if (status === 'Ditolak') select.classList.add('bg-tidak');
        } else {
            alert('Gagal mengupdate status: ' + (response.data.message || 'Unknown error'));
        }
    } catch (error) {
        console.error(error);
        alert('Terjadi kesalahan saat menghubungi server.');
    } finally {
        select.disabled = false;
    }
}
</script>

@push('modals')
<div class="modal fade" id="modalEditJadwal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold w-100 text-center mt-3">Edit Jadwal Ujian</h5>
            </div>
            <div class="modal-body px-4 pb-4">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Ujian</label>
                        <select class="form-select" name="jenis_ujian">
                            <option value="akademik">Tes Akademik</option>
                            <option value="praktik">Tes Praktik</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi</label>
                        <select class="form-select" name="lokasi">
                            <option value="Gedung A">Gedung A</option>
                            <option value="Gedung B">Gedung B</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="2026-03-20">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jam Mulai</label>
                            <input type="time" class="form-control" name="jam_mulai" value="08:00">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_selesai" value="12:30">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn-batal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapusJadwal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content text-center py-4 border-0 shadow">
            <div class="modal-body">
                <h5 class="fw-bold">Konfirmasi</h5>
                <p>Apakah anda yakin akan menghapus jadwal ini?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn-hapus">Hapus</button>
                    <button type="button" class="btn-batal" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

<script>
function tampilkanForm() {
    const jenis = document.getElementById('pilihJenisUjian').value;
    document.querySelectorAll('.form-jadwal-container').forEach(el => el.classList.add('d-none'));
    const target = document.getElementById('form' + jenis.charAt(0).toUpperCase() + jenis.slice(1));
    if (target) target.classList.remove('d-none');
}

function applyStatusColor(select) {
    select.classList.remove('bg-lulus', 'bg-tidak');
    
    if (select.value === 'lulus') {
        select.classList.add('bg-lulus');
    } else if (select.value === 'tidak') {
        select.classList.add('bg-tidak');
    }
}
</script>

@endsection