@extends('layouts.user')

@section('title', 'Form Pendaftaran')

@section('content')

<section class="ppdb-section">
    <div class="container">
        <h1 class="ppdb-title-form">
            Formulir Pendaftaran Calon Siswa
        </h1>

        <form class="ppdb-form" id="pendaftaranForm">
            <h5 class="form-section-title text-start">A. Data Siswa</h5>
            <div class="row g-3">
                @php
                    $education_options = ['SD / MI', 'SMP / MTs', 'SMA / SMK / MA', 'Diploma (D1/D2/D3)', 'Sarjana (S1)', 'Magister (S2)', 'Doktor (S3)', 'Tidak Sekolah'];
                    $religion_options = ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Budha', 'Khonghucu'];
                    $job_options = ['PNS / TNI / POLRI', 'Karyawan Swasta', 'Wiraswasta / Pedagang', 'Petani / Berkebun', 'Nelayan', 'Buruh', 'Ibu Rumah Tangga', 'Tidak Bekerja', 'Lainnya'];
                    
                    $data_siswa = [
                        ['label' => 'Nama Lengkap', 'type' => 'text', 'name' => 'nama_lengkap', 'disabled' => true],
                        ['label' => 'NISN', 'type' => 'text', 'name' => 'nisn', 'disabled' => true],
                        ['label' => 'NPSN SD/MI', 'type' => 'text', 'name' => 'npsn_sd_mi'],
                        ['label' => 'Asal SD/MI', 'type' => 'text', 'name' => 'asal_sd_mi'],
                        [
                            'label' => 'Jenis Kelamin', 
                            'type' => 'select', 
                            'name' => 'jenis_kelamin',
                            'options' => ['Laki-laki', 'Perempuan']
                        ],
                        ['label' => 'Tempat Lahir', 'type' => 'text', 'name' => 'tempat_lahir_siswa'],
                        ['label' => 'Tanggal Lahir', 'type' => 'date', 'name' => 'tanggal_lahir_siswa'],
                        [
                            'label' => 'Agama', 
                            'type' => 'select', 
                            'name' => 'agama_siswa',
                            'options' => $religion_options
                        ],
                        ['label' => 'Anak ke', 'type' => 'number', 'name' => 'anak_ke'],
                        ['label' => 'Jumlah Saudara Kandung', 'type' => 'number', 'name' => 'jml_saudara_kandung'],
                        ['label' => 'Jumlah Saudara Tiri (Opsional)', 'type' => 'number', 'name' => 'jml_saudara_tiri', 'not_required' => true],
                        ['label' => 'Alamat Lengkap', 'type' => 'text', 'name' => 'alamat_siswa'],
                        ['label' => 'Kecamatan', 'type' => 'text', 'name' => 'kec_siswa'],
                        ['label' => 'Kabupaten', 'type' => 'text', 'name' => 'kab_siswa'],
                    ];
                @endphp

                @foreach($data_siswa as $item)
                    <div class="col-md-4 form-group">
                        <label class="fw-bold small">{{ $item['label'] }} {!! isset($item['not_required']) ? '' : '<span class="text-danger">*</span>' !!}</label>
                        
                        @if($item['type'] == 'select')
                            <select class="form-control" name="{{ $item['name'] }}" id="{{ $item['name'] }}" {{ isset($item['not_required']) ? '' : 'required' }}>
                                <option value="">-- Pilih --</option>
                                @foreach($item['options'] as $opt)
                                    <option value="{{ $opt }}">{{ $opt }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{ $item['type'] }}" 
                                   name="{{ $item['name'] }}" 
                                   id="{{ $item['name'] }}" 
                                   class="form-control" 
                                   placeholder="Masukkan {{ $item['label'] }}" 
                                   {{ isset($item['disabled']) && $item['disabled'] ? 'readonly' : '' }}
                                   {{ isset($item['not_required']) ? '' : 'required' }}>
                        @endif
                    </div>
                @endforeach
            </div>

            <h5 class="form-section-title text-start mt-4"> B. Data Orang Tua / Wali</h5>
            <div class="row g-3">
                @php
                    $data_ortu = [
                        ['label' => 'Nama Lengkap Ayah', 'name' => 'nama_ayah'],
                        ['label' => 'Tempat Lahir Ayah', 'name' => 'tempat_lahir_ayah'],
                        ['label' => 'Tanggal Lahir Ayah', 'name' => 'tanggal_lahir_ayah', 'type' => 'date'],
                        [
                            'label' => 'Pendidikan Terakhir Ayah', 
                            'name' => 'pendidikan_ayah', 
                            'type' => 'select', 
                            'options' => $education_options
                        ],
                        [
                            'label' => 'Pekerjaan Ayah', 
                            'name' => 'pekerjaan_ayah',
                            'type' => 'select',
                            'options' => $job_options
                        ],
                        ['label' => 'Penghasilan Ayah (Angka)', 'name' => 'penghasilan_ayah', 'type' => 'number'],
                        [
                            'label' => 'Agama Ayah', 
                            'name' => 'agama_ayah',
                            'type' => 'select',
                            'options' => $religion_options
                        ],
                        ['label' => 'Nama Lengkap Ibu', 'name' => 'nama_ibu'],
                        ['label' => 'Tempat Lahir Ibu', 'name' => 'tempat_lahir_ibu'],
                        ['label' => 'Tanggal Lahir Ibu', 'name' => 'tanggal_lahir_ibu', 'type' => 'date'],
                        [
                            'label' => 'Pendidikan Terakhir Ibu', 
                            'name' => 'pendidikan_ibu', 
                            'type' => 'select', 
                            'options' => $education_options
                        ],
                        [
                            'label' => 'Pekerjaan Ibu', 
                            'name' => 'pekerjaan_ibu',
                            'type' => 'select',
                            'options' => $job_options
                        ],
                        ['label' => 'Penghasilan Ibu (Angka)', 'name' => 'penghasilan_ibu', 'type' => 'number'],
                        ['label' => 'Alamat Lengkap Orang Tua', 'name' => 'alamat_ortu'],
                        ['label' => 'No HP Orang Tua', 'name' => 'no_hp_ortu'],
                    ];
                @endphp

                @foreach($data_ortu as $item)
                    <div class="col-md-4 form-group">
                        <label class="fw-bold small">{{ $item['label'] }} <span class="text-danger">*</span></label>
                        @if(isset($item['type']) && $item['type'] == 'select')
                            <select class="form-control" name="{{ $item['name'] }}" id="{{ $item['name'] }}" required>
                                <option value="">-- Pilih --</option>
                                @foreach($item['options'] as $opt)
                                    <option value="{{ $opt }}">{{ $opt }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{ $item['type'] ?? 'text' }}" 
                                   name="{{ $item['name'] }}" 
                                   id="{{ $item['name'] }}" 
                                   class="form-control" 
                                   placeholder="Masukkan {{ $item['label'] }}" 
                                   required>
                        @endif
                    </div>
                @endforeach
            </div>

            <div id="statusMessage" class="mt-4 text-center d-none alert"></div>

            <div class="d-flex justify-content-end mt-5 gap-2">
                <a href="{{ route('ppdb.pilih-lokasi') }}" class="btn-cancel">
                    Kembali
                </a>

                <button type="submit" class="btn-submit" id="btnSave">
                    <span id="btnText">Simpan & Selanjutnya</span>
                </button>
            </div>

        </form>
    </div>
</section>

@vite(['resources/js/app.js'])

<script type="module">
    const form = document.getElementById('pendaftaranForm');
    const btnSave = document.getElementById('btnSave');
    const btnText = document.getElementById('btnText');
    const statusMsg = document.getElementById('statusMessage');

    // 1. Load Data Pendaftaran yang sudah ada
    async function loadData() {
        try {
            const response = await axios.get('/pendaftaran-data');
            const user = response.data.user;
            const data = response.data.data_pendaftaran;

            // Isi Data dari Akun (Readonly)
            if (document.getElementById('nama_lengkap')) document.getElementById('nama_lengkap').value = user.nama_lengkap;
            if (document.getElementById('nisn')) document.getElementById('nisn').value = user.nisn;

            // Isi Data Form jika sudah pernah diisi
            if (data) {
                Object.keys(data).forEach(key => {
                    const el = document.getElementById(key);
                    if (el) {
                        el.value = data[key];
                    }
                });
            }
        } catch (error) {
            console.error('Gagal memuat data:', error);
        }
    }

    loadData();

    // 2. Simpan Data
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        btnSave.disabled = true;
        btnText.textContent = 'Menyimpan...';
        statusMsg.classList.add('d-none');

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        // Pastikan angka kosong untuk saudara tiri tetap dikirim null atau diproses aman oleh backend
        if (data.jml_saudara_tiri === "") delete data.jml_saudara_tiri;

        try {
            const response = await axios.post('/pendaftaran-data', data);
            
            statusMsg.textContent = 'Data berhasil disimpan!';
            statusMsg.className = 'mt-4 text-center alert alert-success';
            statusMsg.classList.remove('d-none');

            setTimeout(() => {
                window.location.href = "{{ route('ppdb.pendaftaran.diri') }}";
            }, 1500);

        } catch (error) {
            console.error(error);
            let errMsg = 'Gagal menyimpan data. Periksa kembali isian Anda.';
            if (error.response && error.response.data.errors) {
                errMsg = Object.values(error.response.data.errors).flat().join('<br>');
            }
            statusMsg.innerHTML = errMsg;
            statusMsg.className = 'mt-4 text-center alert alert-danger';
            statusMsg.classList.remove('d-none');
        } finally {
            btnSave.disabled = false;
            btnText.textContent = 'Simpan & Selanjutnya';
        }
    });
</script>

@endsection