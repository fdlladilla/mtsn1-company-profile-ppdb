@extends('layouts.user')

@section('title', 'Berita Sekolah')

@section('content')

<section class="berita-section text-center">
    <div class="container">
        <h1 class="berita-title">Berita Sekolah</h1>

        <div class="row justify-content-center g-4">
            @foreach($berita_list as $berita)
            <div class="col-md-4">
                <a href="{{ route('berita.detail', $berita['id']) }}" class="text-decoration-none">
                    <div class="berita-card">
                        @php
                            $imagePath = str_starts_with($berita['gambar'], 'http') 
                                ? $berita['gambar'] 
                                : asset('images/berita/' . ($berita['gambar'] ?: 'default.png'));
                        @endphp
                        <img src="{{ $imagePath }}" class="berita-img">
                        <div class="berita-content">
                            <h4 class="berita-heading">{{ $berita['judul'] }}</h4>
                            <p class="berita-desc">{{ Str::limit($berita['desc'], 150) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            @if(count($berita_list) == 0)
                <div class="col-12">
                    <p class="text-muted">Belum ada berita terbaru.</p>
                </div>
            @endif

        </div>
    </div>
</section>
@endsection