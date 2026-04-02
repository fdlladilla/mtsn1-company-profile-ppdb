@extends('layouts.user')

@section('title', 'Guru Sekolah')

@section('content')

<section class="struktural-section text-center">
    <div class="container">
        <h1 class="struktural-title">Guru Mata Pelajaran</h1>

        <div class="row justify-content-center g-4">
            
            @php
                $daftarGuru = [
                    'H. Bambang Setiawan, S.Ag., M.Pd.',
                    'H. Bambang Setiawan, S.Ag., M.Pd.',
                    'H. Bambang Setiawan, S.Ag., M.Pd.',
                    'H. Bambang Setiawan, S.Ag., M.Pd.',
                    'H. Bambang Setiawan, S.Ag., M.Pd.',
                    'H. Bambang Setiawan, S.Ag., M.Pd.',
                    'H. Bambang Setiawan, S.Ag., M.Pd.',
                    'H. Bambang Setiawan, S.Ag., M.Pd.'
                ];
            @endphp

            @foreach($daftarGuru as $nama)
            <div class="col-md-4">
                <div class="struktural-card shadow-sm">
                    <img src="{{ asset('images/struktural/guru.png') }}" alt="Guru" class="img-struktural">
                    <h4 class="role-title">Guru Mata Pelajaran</h4>
                    <p class="person-name">{{ $nama }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection