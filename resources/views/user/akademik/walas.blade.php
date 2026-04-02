@extends('layouts.user')

@section('title', 'Wali Kelas')

@section('content')

<section class="struktural-section text-center">
    <div class="container">
        <h1 class="struktural-title">Wali Kelas</h1>

        <div class="row justify-content-center g-4">
            @php
                $daftarWalas = [
                    ['nama' => 'H. Bambang Setiawan, S.Ag., M.Pd.', 'kelas' => 'VII-A'],
                    ['nama' => 'H. Bambang Setiawan, S.Ag., M.Pd.', 'kelas' => 'VII-B'],
                    ['nama' => 'H. Bambang Setiawan, S.Ag., M.Pd.', 'kelas' => 'VIII-A'],
                    ['nama' => 'H. Bambang Setiawan, S.Ag., M.Pd.', 'kelas' => 'VIII-B'],
                    ['nama' => 'H. Bambang Setiawan, S.Ag., M.Pd.', 'kelas' => 'IX-A'],
                    ['nama' => 'H. Bambang Setiawan, S.Ag., M.Pd.', 'kelas' => 'IX-B'],
                ];
            @endphp

            @foreach($daftarWalas as $walas)
            <div class="col-md-4">
                <div class="struktural-card shadow-sm">
                    <img src="{{ asset('images/struktural/guru.png') }}" alt="Wali Kelas" class="img-struktural">
                    <h4 class="role-title">Wali Kelas {{ $walas['kelas'] }}</h4>
                    <p class="person-name">{{ $walas['nama'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection