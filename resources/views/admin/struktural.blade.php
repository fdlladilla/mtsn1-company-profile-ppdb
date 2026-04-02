@extends('layouts.admin')

@section('title', 'Manajemen Struktural')

@section('content')

<section class="struktural-section py-4">
    <div class="container-fluid">
        <h1 class="struktural-title">Struktural Sekolah</h1>

        <div class="preview-container">
            <h4 class="struktural-subtitle">Preview</h4> 
            <div class="row g-4"> 
                @php
                    $previewCards = [
                        ['icon' => '🏫', 'title' => 'Struktural Sekolah'],
                        ['icon' => '👨‍🏫', 'title' => 'Wali Kelas'],
                        ['icon' => '👩‍🏫', 'title' => 'Guru Mata Pelajaran'],
                    ];
                @endphp
                @foreach($previewCards as $card)
                <div class="col-md-4">
                    <div class="stat-card shadow-sm border-0">
                        <div class="akademik-icon mb-3 fs-1 text-center">{{ $card['icon'] }}</div>
                        <h5 class="fw-bold text-center" style="color: #197A1F;">{{ $card['title'] }}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 mt-5"> 
            <h4 class="struktural-subtitle">Struktural Sekolah</h4>
            <div class="dropdown">
                <button class="btn border-0 p-0" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-chevron-down fs-4"></i>
                </button>
                <ul class="dropdown-menu shadow border-0">
                    @foreach($previewCards as $card)
                        <li><a class="dropdown-item" href="#">{{ $card['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="data-container">
            @php
                $anggotaList = [
                    ['nama' => 'Wali Kelas 9A', 'jabatan' => 'Drs. Ahmad Fauzi, M.Pd.'],
                    ['nama' => 'Wali Kelas 7G', 'jabatan' => 'H. Bambang Setiawan, S.Ag., M.Pd.'],
                    ['nama' => 'Wali Kelas 8F', 'jabatan' => 'Nur Aini, S.Pd., M.Pd.']
                ];
            @endphp

            @foreach($anggotaList as $item)
            <div class="data-item d-flex justify-content-between align-items-center shadow-sm">
                <div>
                    <h5 class="fw-bold m-0">{{ $item['nama'] }}</h5>
                    <p class="text-muted m-0 small">{{ $item['jabatan'] }}</p>
                </div>
                
                <div class="d-flex gap-2">
                    <button class="btn-icon edit" data-bs-toggle="modal" data-bs-target="#modalEditStruktural">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn-icon delete" data-bs-toggle="modal" data-bs-target="#modalHapusStruktural">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambahStruktural">
                Tambahkan Anggota
            </button>
        </div>
    </div>
</section>
@endsection

@push('modals')
<div class="modal fade" id="modalTambahStruktural" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 20px;">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold w-100 text-center mt-3">Tambah Anggota</h5>
            </div>
            <div class="modal-body px-4 pb-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Anggota</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jabatan / Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan jabatan">
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

<div class="modal fade" id="modalEditStruktural" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold w-100 text-center mt-3">Edit Anggota</h5>
            </div>
            <div class="modal-body px-4 pb-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Anggota</label>
                        <input type="text" class="form-control" value="Wali Kelas 9A">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jabatan / Keterangan</label>
                        <input type="text" class="form-control" value="Drs. Ahmad Fauzi, M.Pd.">
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

<div class="modal fade" id="modalHapusStruktural" tabindex="-1">
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