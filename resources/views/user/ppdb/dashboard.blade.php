@extends('layouts.user')

@section('title', 'Dashboard PPDB')

@section('content')

<section class="ppdb-section text-center">
    <div class="container">
        <h1 class="ppdb-title">
            Dashboard PPDB
        </h1>

        <div class="row justify-content-center g-5">
            @php
                $menus = [
                    [
                        'route' => 'ppdb.pilih-lokasi',
                        'title' => 'Pendaftaran Siswa Baru',
                        'icon'  => 'bi-pencil-square' 
                    ],
                    [
                        'route' => 'ppdb.administratif',
                        'title' => 'Status Administratif',
                        'icon'  => 'bi-text-paragraph'
                    ],
                    [
                        'route' => 'ppdb.ujian',
                        'title' => 'Jadwal Ujian',
                        'icon'  => 'bi-calendar-event-fill'
                    ],
                    [
                        'route' => 'ppdb.kelulusan',
                        'title' => 'Informasi Kelulusan',
                        'icon'  => 'bi-mortarboard-fill'
                    ],
                ];
            @endphp

            @foreach($menus as $menu)
            <div class="col-lg-3 col-md-6 text-center">
                <a href="{{ route($menu['route']) }}" class="ppdb-menu-link">
                    <div class="icon-circle-wrapper">
                        <i class="bi {{ $menu['icon'] }}"></i>
                    </div>
                    <h5 class="menu-title">{{ $menu['title'] }}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection