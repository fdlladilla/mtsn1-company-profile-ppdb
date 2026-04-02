@extends('layouts.user')

@section('title', 'Sarana dan Prasarana Sekolah')

@section('content')

<section class="sarpas-section text-center">
    <div class="container">
        <h1 class="sarpas-title">Sarana dan Prasarana</h1>

        <div class="row justify-content-center g-4">
            @php
                $fasilitas = [
                    [
                        'nama' => 'Perpustakaan',
                        'gambar' => 'perpus.jpg'
                    ],
                    [
                        'nama' => 'Masjid',
                        'gambar' => 'masjid.jpg'
                    ],
                    [
                        'nama' => 'Lapangan Futsal',
                        'gambar' => 'lapangan.jpg'
                    ],
                    // Tinggal tambah di sini kalau ada fasilitas baru
                ];
            @endphp

            @foreach($fasilitas as $item)
                <div class="col-md-4">
                    <div class="sarpas-card">
                        <img src="{{ asset('images/fasilitas/' . $item['gambar']) }}" class="sarpas-img" alt="{{ $item['nama'] }}">
                        <div class="sarpas-content">
                            <h4 class="sarpas-heading">{{ $item['nama'] }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection