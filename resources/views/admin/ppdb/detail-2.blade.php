@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('content')

<section class="ppdb-section py-4">
    <div class="container-fluid">
        <h1 class="ppdb-title">PPDB</h1>

        <form class="ppdb-form">
            @php
                $dp = $pendaftar['data_pendaftar'] ?? [];
                $pd = $dp['pengembangan_diri'] ?? [];
                $backendUrl = config('services.backend.url');
                // Remove /api from backendUrl if present to get base storage path
                $baseUri = str_replace('/api', '', $backendUrl);
            @endphp

            <h5 class="form-section-title text-start">C. Pengembangan Diri</h5>
            <div class="row g-3 mb-4">
                @foreach(['agama', 'sains', 'bahasa', 'olahraga', 'ekstra'] as $cat)
                    <div class="col-md-4 mb-3">
                        <label class="fw-bold small text-uppercase">{{ $cat }}</label>
                        <div class="p-2 border rounded bg-light" style="min-height: 45px;">
                            @if(isset($pd[$cat]) && is_array($pd[$cat]))
                                @foreach($pd[$cat] as $item)
                                    <span class="badge bg-success me-1">{{ $item }}</span>
                                @endforeach
                            @else
                                <span class="text-muted small">Tidak ada data</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <h5 class="form-section-title text-start">D. Cita-Citaku</h5>
            <div class="row g-3 mb-4">
                <div class="col-12 form-group">
                    <textarea class="form-control" readonly disabled style="min-height: 100px;">{{ $dp['cita_cita'] ?? 'Tidak ada data' }}</textarea>
                </div>
            </div>

            <h5 class="form-section-title text-start">E. Lampiran Berkas</h5>
            <div class="row g-4">
                @php 
                    $docs = [
                        ['label' => 'Fotocopy KK', 'key' => 'path_kk'],
                        ['label' => 'KTP Ortu', 'key' => 'path_ktp'],
                        ['label' => 'Pas Foto', 'key' => 'path_foto'],
                        ['label' => 'Raport', 'key' => 'path_raport'],
                        ['label' => 'Ket. Aktif', 'key' => 'path_surat_aktif'],
                        ['label' => 'Print NISN', 'key' => 'path_nisn'],
                        ['label' => 'Sertifikat', 'key' => 'path_sertifikat']
                    ]; 
                @endphp

                @foreach($docs as $doc)
                <div class="col-6 col-md-3">
                    <div class="file-preview-box {{ isset($dp[$doc['key']]) ? 'border-success' : '' }}">
                        <i class="bi {{ isset($dp[$doc['key']]) ? 'bi-file-earmark-check text-success' : 'bi-file-earmark-x text-muted' }} fs-1 mb-2"></i>
                        <span class="file-label d-block mb-2">{{ $doc['label'] }}</span>
                        @if(isset($dp[$doc['key']]))
                            <a href="{{ $baseUri . '/storage/' . $dp[$doc['key']] }}" target="_blank" class="btn btn-sm btn-outline-success">Lihat File</a>
                        @else
                            <span class="badge bg-light text-muted border">Belum Ada</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-end mt-5 d-flex justify-content-end gap-3">
                <a href="{{ route('admin.ppdb.detail', $pendaftar['id']) }}" class="btn-cancel">Kembali</a>
                <a href="{{ route('admin.ppdb') }}" class="btn-submit">Selesai</a>
            </div>
            
        </form>
    </div>
</section>
@endsection