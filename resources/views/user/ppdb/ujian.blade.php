@extends('layouts.user')

@section('title', 'Jadwal Ujian')

@section('content')

<section class="status-section">
    <div class="container">
        <h1 class="ppdb-title">
            Jadwal Ujian
        </h1>

    <div class="card-custom">
        <div class="exam-box mb-3">
            <h3 class="exam-title"><strong>Tes Akademik</strong></h3>
            <div class="exam-details-group">
                <p>12 Juni 2026  |  08.00 WIB  |  Kampus A</p>
            </div>
        </div>

        <div class="exam-box mb-3">
            <h3 class="exam-title"><strong>Tes Praktik</strong></h3>
            <div class="exam-details-group">
                <p>13 Juni 2026  |  08.00 WIB  |  Kampus B</p>
            </div>
        </div>

        <div class="note-box">
            Peserta wajib hadir 30 menit sebelum tes dimulai!
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

            @foreach($steps as $index => $step)
                <div class="step-item">
                    <span class="step-number">{{ $index + 1 }}</span>
                    {{ $step }}
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('ppdb.dashboard') }}" class="btn-cancel text-decoration-none d-inline-flex align-items-center justify-content-center">
                Kembali
            </a>
        </div>
        
    </div>
</section>
@endsection