@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')

<section class="berita-section">
    <div class="container-fluid">
        <h1 class="berita-title">Berita</h1>

        <div class="preview-container">
            <h4 class="berita-subtitle mb-4">Preview</h4>
            <div class="row g-4">
                
                <div class="col-md-4">
                    <div class="news-preview-card border-0 shadow-sm">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/berita/maulid_nabi.png') }}" alt="Maulid Nabi">
                        </div>
                        <div class="card-body-news text-center">
                            <h6 class="fw-bold">Kegiatan Maulid Nabi</h6>
                            <p class="text-muted small">Peringatan Maulid Nabi Muhammad SAW di madrasah biasanya diisi dengan pembacaan sholawat, ceramah agama, dan tausiyah.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="news-preview-card border-0 shadow-sm">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/berita/agustus.png') }}" alt="17 Agustus">
                        </div>
                        <div class="card-body-news text-center">
                            <h6 class="fw-bold">Kegiatan 17 Agustus</h6>
                            <p class="text-muted small">Kegiatan 17 Agustus di madrasah biasanya diawali dengan upacara bendera untuk memperingati Hari Kemerdekaan Republik Indonesia. Setelah upacara, diadakan berbagai lomba.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="news-preview-card border-0 shadow-sm">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/berita/hari_guru.png') }}" alt="Hari Guru">
                        </div>
                        <div class="card-body-news text-center">
                            <h6 class="fw-bold">Memperingati Hari Guru</h6>
                            <p class="text-muted small">Siswa dan siswi madrasah memperingati Hari Guru dengan penuh rasa hormat dan kebersamaan. Kegiatan biasanya diawali dengan upacara bendera di halaman sekolah yang diikuti oleh seluruh guru, staf, serta peserta didik.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="list-berita-wrapper mt-5">
            <h4 class="berita-subtitle mb-4">List Berita</h4>

            <div class="data-container">
                @php
                    $beritaList = [
                        ['title' => 'Kegiatan Maulid Nabi', 'desc' => 'Memperingati Nabi Muhammad SAW'],
                        ['title' => 'Kegiatan 17 Agustus', 'desc' => 'HUT RI Ke-79 Madrasah'],
                        ['title' => 'Memperingati Hari Guru', 'desc' => 'Terima kasih Bapak dan Ibu Guru']
                    ];
                @endphp

                @foreach($beritaList as $berita)
                <div class="data-item d-flex justify-content-between align-items-center mb-3 shadow-sm">
                    <div class="data-info">
                        <h5 class="data-title fw-bold m-0">{{ $berita['title'] }}</h5>
                        <small class="data-desc text-muted">{{ $berita['desc'] }}</small>
                    </div>
                    
                    <div class="action-btns d-flex gap-2">
                        <button class="btn-icon edit" data-bs-toggle="modal" data-bs-target="#modalEditBerita">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn-icon delete" data-bs-toggle="modal" data-bs-target="#modalHapusBerita">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button class="btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambahBerita">
                    Tambah Berita
                </button>
            </div>
        </div>
    </div>
</section>
@endsection

@push('modals')
<div class="modal fade" id="modalTambahBerita" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold w-100 text-center">Tambah Berita</h5>
            </div>
            <div class="modal-body px-4 pb-4">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" class="form-control" placeholder="Masukkan judul berita">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan keterangan">
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

<div class="modal fade" id="modalEditBerita" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold w-100 text-center">Edit Berita</h5>
            </div>
            <div class="modal-body px-4 pb-4">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" class="form-control" value="Kegiatan Maulid Nabi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" class="form-control" value="Memperingati Nabi Muhammad SAW">
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

<div class="modal fade" id="modalHapusBerita" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content text-center py-4 border-0 shadow">
            <div class="modal-body">
                <h5 class="fw-bold">Konfirmasi</h5>
                <p>Apakah anda yakin akan menghapus item ini?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn-hapus">Hapus</button>
                    <button type="button" class="btn-batal" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush