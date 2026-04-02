@extends('layouts.user')

@section('title', 'PPDB')

@section('content')

<section class="ppdb-hero">
    <img src="{{ asset('images/ppdb/ppdb-bg.png') }}" class="ppdb-bg">
    <div class="ppdb-overlay"></div>
    <div class="container text-center ppdb-content">

        <h1 class="ppdb-title">
            Penerimaan Peserta Didik Baru
        </h1>

        <p class="ppdb-subtitle">
            MTs Negeri – Unggul dalam Prestasi & Akhlak
        </p>

        <a href="{{ route('ppdb.menu') }}" class="btn-ppdb">
            Mulai PPDB
        </a>

    </div>

</section>
@endsection