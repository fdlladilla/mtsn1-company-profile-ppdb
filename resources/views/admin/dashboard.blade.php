@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<section class="dashboard-section">
    <div class="container-fluid">
        <h1 class="dashboard-title">Dashboard</h1>
        
        <div class="row g-3 mb-5 text-center">
            @php 
                $statsDisplay = [
                    ['Total Pendaftar', $stats['total_pendaftar'] ?? 0], 
                    ['Lolos Administrasi', $stats['terverifikasi'] ?? 0], 
                    ['Pending', $stats['pending'] ?? 0], 
                    ['Ditolak', $stats['ditolak'] ?? 0]
                ]; 
            @endphp
            @foreach($statsDisplay as $s)
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <h3 class="stat-value fw-bold m-0">{{ $s[1] }}</h3>
                    <p class="stat-label mb-0 text-muted" style="font-size: 14px;">{{ $s[0] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="section-subtitle fw-bold m-0">Hero Section</h3>
        </div>

        <div class="data-container">
            @php
                $heroSections = [
                    ['title' => 'Madrasah Unggul & Berkarakter', 'desc' => 'Mewujudkan generasi berilmu, berakhlak mulia, dan berprestasi.'],
                    ['title' => 'Madrasah Negeri Modern', 'desc' => 'Sekolah Islami Berbasis Teknologi.'],
                    ['title' => 'MTsN 1 Padang Lawas Utara', 'desc' => 'Menjadi madrasah pilihan utama masyarakat.']
                ];
            @endphp

            @foreach($heroSections as $hero)
            <div class="data-item d-flex justify-content-between align-items-center mb-3 shadow-sm">
                <div class="data-info">
                    <h5 class="data-title fw-bold m-0">{{ $hero['title'] }}</h5>
                    <small class="data-desc text-muted">{{ $hero['desc'] }}</small>
                </div>
                
                <div class="action-btns d-flex gap-2">
                    <button class="btn-icon edit" data-bs-toggle="modal" data-bs-target="#modalEdit">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn-icon delete" data-bs-toggle="modal" data-bs-target="#modalHapus">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-end mt-4">
        <button class="btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Hero Section
        </button>
    </div>
</section>
@endsection

@push('modals')
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold w-100 text-center">Tambah Hero Section</h5>
            </div>
            <div class="modal-body px-4 pb-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Hero</label>
                        <input type="text" class="form-control" placeholder="Masukkan judul">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tagline</label>
                        <input type="text" class="form-control" placeholder="Masukkan tagline">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Foto</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn-batal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold w-100 text-center">Edit Hero Section</h5>
            </div>
            <div class="modal-body px-4 pb-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Hero</label>
                        <input type="text" class="form-control" value="Judul Lama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tagline</label>
                        <input type="text" class="form-control" value="Tagline Lama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Foto</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn-batal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content text-center py-4 border-0 shadow">
            <div class="modal-body">
                <h5 class="fw-bold">Konfirmasi</h5>
                <p>Apakah anda yakin akan menghapus item ini?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button class="btn-hapus">Hapus</button>
                    <button class="btn-batal" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush