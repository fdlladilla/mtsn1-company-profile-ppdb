@extends('layouts.user')

@section('title', 'Akademik')

@section('content')

<section class="akademik-hero text-center">
    <div class="container">
        <h1 class="akademik-title">Akademik</h1>
        <p class="akademik-subtitle">
            Informasi Struktur dan Tenaga Pengajar
        </p>

        <div class="row justify-content-center mt-5 g-4">
            @php
                $menuAkademik = [
                    [
                        'route' => 'akademik.struktur',
                        'icon'  => '🏫',
                        'title' => 'Struktural Sekolah'
                    ],
                    [
                        'route' => 'akademik.walas',
                        'icon'  => '👨‍🏫',
                        'title' => 'Wali Kelas'
                    ],
                    [
                        'route' => 'akademik.guru',
                        'icon'  => '👩‍🏫',
                        'title' => 'Guru Mata Pelajaran'
                    ],
                ];
            @endphp

            @foreach($menuAkademik as $menu)
            <div class="col-md-4">
                <a href="{{ route($menu['route']) }}" class="akademik-card text-decoration-none">
                    <div class="akademik-icon">{{ $menu['icon'] }}</div>
                    <h4>{{ $menu['title'] }}</h4>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection