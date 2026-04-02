@extends('layouts.user')

@section('title', 'Struktural Sekolah')

@section('content')

<section class="struktural-section text-center">
    <div class="container">
        <h1 class="struktural-title">Struktural Sekolah</h1>

        <div class="row justify-content-center g-4">
            @php
                $struktural = [
                    [
                        'jabatan' => 'Kepala MTsN',
                        'nama'    => 'H. Bambang Setiawan, S.Ag., M.Pd.',
                        'foto'    => 'guru.png'
                    ],
                    [
                        'jabatan' => 'Wakil MTsN',
                        'nama'    => 'H. Bambang Setiawan, S.Ag., M.Pd.',
                        'foto'    => 'guru.png'
                    ],
                    [
                        'jabatan' => 'Sekretaris',
                        'nama'    => 'H. Bambang Setiawan, S.Ag., M.Pd.',
                        'foto'    => 'guru.png'
                    ],
                ];
            @endphp

            @foreach($struktural as $item)
            <div class="col-md-4">
                <div class="struktural-card shadow-sm">
                    <img src="{{ asset('images/struktural/' . $item['foto']) }}" alt="{{ $item['jabatan'] }}" class="img-struktural">
                    <h4 class="role-title">{{ $item['jabatan'] }}</h4>
                    <p class="person-name">{{ $item['nama'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection