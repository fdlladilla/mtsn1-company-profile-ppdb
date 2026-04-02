@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')

<section class="datasiswa-section">
    <div class="container-fluid">
        <h1 class="datasiswa-title">Daftar Siswa</h1>

        <div class="filter-container">
            <h2 class="filter-title">Daftar Siswa Lulus</h2>
            <form action="#" method="GET" class="filter-form">
                <label class="fw-bold me-2">Tahun Ajaran</label>
                <select class="form-select select-tahun">
                    <option value="2025/2026">2025/2026</option>
                    <option value="2024/2025">2024/2025</option>
                    <option value="2025/2026">2023/2024</option>
                    <option value="2024/2025">2022/2023</option>
                </select>
                <button type="submit" class="btn-tampilkan">Tampilkan</button>
            </form>
        </div>

        <div class="table-responsive mt-5">
            <table class="table-lulus">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $index => $s)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $s['nama_lengkap'] }}</td>
                        <td class="text-center">{{ $s['nisn'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-end mt-3">
            <button class="btn-export">Export Excel</button>
        </div>
        
    </div>
</section>
@endsection