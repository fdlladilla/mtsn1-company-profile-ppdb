@extends('layouts.user')

@section('title', 'Rapor Digital Madrasah')

@section('content')

<section class="rdm-section">
    <div class="container d-flex justify-content-center">
        
        <div class="rdm-card">
            <div class="rdm-logo-container">
                <img src="{{ asset('images/logo_rdm.png') }}" class="rdm-logo">
            </div>

            <div class="rdm-content text-center">
                <p>
                    Raport Digital Madrasah (RDM) adalah sistem aplikasi resmi dari 
                    Kementerian Agama yang digunakan oleh guru untuk menginput, 
                    mengelola, dan memproses nilai siswa secara digital.
                </p>
            </div>

            <div class="rdm-action">
                <a href="https://hdmadrasah.id/#/beranda" target="_blank" class="btn-rdm">
                    Masuk Ke RDM
                </a>
            </div>
        </div>

    </div>
</section>
@endsection