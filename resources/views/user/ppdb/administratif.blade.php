@extends('layouts.user')

@section('title', 'Administratif')

@section('content')

<section class="status-section">
    <div class="container">
        <h1 class="ppdb-title">
            Status Administratif
        </h1>

    <div class="card-custom">
        <div class="status-box status-waiting">
            <span class="status-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                </svg>
            </span>
            <div>
                <h4>Menunggu Verifikasi Berkas</h4>
                <p>Berkas pendaftaran sedang diverifikasi</p>
            </div>
        </div>

        <div class="status-steps">
            @php
                $steps = [
                    'Pendaftaran Online',
                    'Verifikasi Berkas',
                    'Tes Seleksi',
                    'Pengumuman Hasil'
                ];
            @endphp

            @php
                $current_step = 2; 
                $steps = ['Pendaftaran Online', 'Verifikasi Berkas', 'Tes Seleksi', 'Pengumuman Hasil'];
            @endphp

            @foreach($steps as $index => $step)
                <div class="step-item {{ ($index + 1) <= $current_step ? 'active' : '' }}">
                    <span class="step-number">{{ $index + 1 }}</span>
                    {{ $step }}
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('ppdb.dashboard') }}" class="btn-cancel text-decoration-none d-inline-flex align-items-center justify-content-center" style="height: 45px; min-width: 120px;">
                Kembali
            </a>
        </div>

</section>
@endsection