@extends('layouts.user')

@section('title', 'Informasi Kelulusan')

@section('content')

<section class="status-section">
    <div class="container">
        <h1 class="ppdb-title">
            Informasi Kelulusan
        </h1>

    <div class="card-custom">
        <h4 class="text-kelulusan mb-5">
            Pengumuman Kelulusan PPDB <br> MTsN 1 Padang Lawas Utara
        </h4>

        <div class="user-info">
            <p><strong>Nama :</strong> Indira Sistamarien</p>
            <p><strong>Status Kelulusan :</strong> <span class="status-text-lulus">Lulus</span></p>
        </div>

        <table class="table table-custom">
            <thead>
                <tr>
                    <th>Komponen</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tes Tertulis dan Praktik</td>
                    <td><span class="status-text-lulus">Lulus</span></td>
                </tr>
                <tr>
                    <td>Administratif</td>
                    <td><span class="status-text-lulus">Lulus</span></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('ppdb.dashboard') }}" class="btn-cancel text-decoration-none d-inline-flex align-items-center justify-content-center">
                Kembali
            </a>
        </div>
    </div>

</section>
@endsection