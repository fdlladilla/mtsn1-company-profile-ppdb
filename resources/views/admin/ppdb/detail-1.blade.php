@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('content')

<section class="ppdb-section py-4">
    <div class="container-fluid">
        <h1 class="ppdb-title">PPDB</h1>

        <form class="ppdb-form">
            <h5 class="form-section-title text-start">A. Data Siswa</h5>
            <div class="row g-3 mb-4">
                @php
                    $dp = $pendaftar['data_pendaftar'] ?? [];
                    $data_siswa = [
                        ['label' => 'Nama Lengkap', 'type' => 'text', 'value' => $pendaftar['nama_lengkap']],
                        ['label' => 'NISN', 'type' => 'text', 'value' => $pendaftar['nisn']],
                        ['label' => 'NPSN SD/MI', 'type' => 'text', 'value' => $dp['npsn_sd_mi'] ?? ''],
                        ['label' => 'Asal SD/MI', 'type' => 'text', 'value' => $dp['asal_sd_mi'] ?? ''],
                        [
                            'label' => 'Jenis Kelamin', 
                            'type' => 'select', 
                            'value' => $dp['jenis_kelamin'] ?? '',
                            'options' => ['Laki-laki', 'Perempuan']
                        ],
                        ['label' => 'Tempat Lahir', 'type' => 'text', 'value' => $dp['tempat_lahir_siswa'] ?? ''],
                        ['label' => 'Tanggal Lahir', 'type' => 'text', 'value' => $dp['tanggal_lahir_siswa'] ?? ''],
                        ['label' => 'Agama', 'type' => 'text', 'value' => $dp['agama_siswa'] ?? ''],
                        ['label' => 'Anak ke', 'type' => 'number', 'value' => $dp['anak_ke'] ?? ''],
                        ['label' => 'Jumlah Saudara Kandung', 'type' => 'number', 'value' => $dp['jml_saudara_kandung'] ?? ''],
                        ['label' => 'Jumlah Saudara Tiri', 'type' => 'number', 'value' => $dp['jml_saudara_tiri'] ?? ''],
                        ['label' => 'Alamat Lengkap', 'type' => 'text', 'value' => $dp['alamat_siswa'] ?? ''],
                        ['label' => 'Kecamatan', 'type' => 'text', 'value' => $dp['kec_siswa'] ?? ''],
                        ['label' => 'Kabupaten', 'type' => 'text', 'value' => $dp['kab_siswa'] ?? ''],
                    ];
                @endphp

                @foreach($data_siswa as $item)
                    <div class="col-md-4 form-group">
                        <label class="fw-bold small">{{ $item['label'] }}</label>
                        
                        @if($item['type'] == 'select')
                            <select class="form-control" readonly disabled>
                                <option value="">-- {{ $item['label'] }} --</option>
                                @foreach($item['options'] as $opt)
                                    <option value="{{ $opt }}" {{ $item['value'] == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{ $item['type'] }}" class="form-control" value="{{ $item['value'] }}" readonly disabled>
                        @endif
                    </div>
                @endforeach
            </div>

            <h5 class="form-section-title text-start mt-4">B. Data Orang Tua / Wali</h5>
                <div class="row g-3 mb-4">
                    @php
                    $data_ortu = [
                        ['label' => 'Nama Lengkap Ayah', 'value' => $dp['nama_ayah'] ?? ''],
                        ['label' => 'Tempat Lahir Ayah', 'value' => $dp['tempat_lahir_ayah'] ?? ''],
                        ['label' => 'Pendidikan Ayah', 'value' => $dp['pendidikan_ayah'] ?? ''],
                        ['label' => 'Pekerjaan Ayah', 'value' => $dp['pekerjaan_ayah'] ?? ''],
                        ['label' => 'Agama Ayah', 'value' => $dp['agama_ayah'] ?? ''],
                        ['label' => 'Nama Lengkap Ibu', 'value' => $dp['nama_ibu'] ?? ''],
                        ['label' => 'Tempat Lahir Ibu', 'value' => $dp['tempat_lahir_ibu'] ?? ''],
                        ['label' => 'Pendidikan Ibu', 'value' => $dp['pendidikan_ibu'] ?? ''],
                        ['label' => 'Alamat Lengkap Orang Tua', 'value' => $dp['alamat_ortu'] ?? ''],
                        ['label' => 'Pekerjaan Ibu', 'value' => $dp['pekerjaan_ibu'] ?? ''],
                        ['label' => 'Penghasilan Ayah & Ibu', 'value' => ($dp['penghasilan_ayah'] ?? 0) + ($dp['penghasilan_ibu'] ?? 0)],
                        ['label' => 'No HP Orang Tua', 'value' => $dp['no_hp_ortu'] ?? ''],
                    ];
                    @endphp

                @foreach($data_ortu as $item)
                    <div class="col-md-4 form-group">
                        <label class="fw-bold small">{{ $item['label'] }}</label>
                        <input type="text" class="form-control" value="{{ $item['value'] }}" readonly disabled>
                    </div>
                @endforeach
            </div>

            <div class="text-end mt-5 d-flex justify-content-end gap-3">
                <a href="{{ route('admin.ppdb') }}" class="btn-cancel">Kembali</a>
                <a href="{{ route('admin.ppdb.detail.next', $pendaftar['id']) }}" class="btn-submit">Selanjutnya</a>
            </div>
            
        </form>
    </div>
</section>
@endsection