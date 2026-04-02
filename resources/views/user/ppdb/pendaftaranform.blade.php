@extends('layouts.user')

@section('title', 'Form Pendaftaran')

@section('content')

<section class="ppdb-section">
    <div class="container">
        <h1 class="ppdb-title-form">
            Formulir Pendaftaran Calon Siswa
        </h1>

        <form class="ppdb-form" id="uploadForm" enctype="multipart/form-data">
        <div class="form-section-title text-start">
            E. Lampiran Berkas
        </div>

        @php
            $files = [
                ['label' => 'Upload Fotocopy KK', 'name' => 'path_kk', 'id' => 'path_kk'],
                ['label' => 'Upload Fotocopy KTP Orang Tua', 'name' => 'path_ktp', 'id' => 'path_ktp'],
                ['label' => 'Upload Pas Foto 3x4 (1 Lembar)', 'name' => 'path_foto', 'id' => 'path_foto'],
                ['label' => 'Upload Raport', 'name' => 'path_raport', 'id' => 'path_raport'],
                ['label' => 'Upload Surat Keterangan Aktif Belajar', 'name' => 'path_surat_aktif', 'id' => 'path_surat_aktif'],
                ['label' => 'Upload Print Out NISN', 'name' => 'path_nisn', 'id' => 'path_nisn'],
                ['label' => 'Upload Sertifikat TKA', 'name' => 'path_sertifikat', 'id' => 'path_sertifikat'],
            ];
        @endphp

        @foreach($files as $f)
        <div class="upload-item">
            <label>{{ $f['label'] }} <span class="text-danger">*</span></label>
            <input type="file" name="{{ $f['name'] }}" id="{{ $f['id'] }}" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
            <small class="text-muted d-none" id="label-{{ $f['name'] }}">Berkas sudah terupload</small>
        </div>
        @endforeach

        <div class="form-section-title text-start mt-4">
            F. Persetujuan Orang Tua / Wali
        </div>

        <div class="agreement-box">
            <input type="checkbox" id="agree" required>
            <label for="agree">
                Saya bertanggung jawab penuh atas kebenaran data dan
                menyetujui seluruh ketentuan PPDB yang berlaku.
            </label>
        </div>

        <div id="statusMessage" class="mt-4 text-center d-none alert"></div>

        <div class="d-flex justify-content-end mt-5 gap-2 align-items-center">
            <a href="{{ route('ppdb.pendaftaran.diri') }}" 
            class="btn-cancel d-inline-flex align-items-center justify-content-center" 
            style="height: 45px; min-width: 120px;">
                Kembali
            </a>

            <button type="submit" 
                    id="btnSubmit"
                    class="btn-daftar d-inline-flex align-items-center justify-content-center" 
                    style="height: 45px; min-width: 120px;">
                <span id="btnText">Daftar</span>
            </button>
        </div>
        </form>
    </div>
</section>

@vite(['resources/js/app.js'])

<script type="module">
    const form = document.getElementById('uploadForm');
    const btnSubmit = document.getElementById('btnSubmit');
    const btnText = document.getElementById('btnText');
    const statusMsg = document.getElementById('statusMessage');
    const agree = document.getElementById('agree');

    // 1. Cek apakah berkas sudah pernah diupload sebelumnya
    async function checkExistingDocs() {
        try {
            const response = await axios.get('/pendaftaran-data');
            const data = response.data.data_pendaftaran;
            if (data) {
                const fields = ['path_kk', 'path_ktp', 'path_foto', 'path_raport', 'path_surat_aktif', 'path_nisn', 'path_sertifikat'];
                fields.forEach(f => {
                    if (data[f]) {
                        const label = document.getElementById(`label-${f}`);
                        if (label) {
                            label.classList.remove('d-none');
                            label.classList.add('text-success');
                        }
                    }
                });
                if (data.is_final_submit) {
                    agree.checked = true;
                }
            }
        } catch (error) {
            console.error('Gagal memuat status berkas:', error);
        }
    }

    checkExistingDocs();

    // 2. Submit Form (Upload Files)
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!agree.checked) {
            alert('Anda harus menyetujui pernyataan di atas sebelum mendaftar.');
            return;
        }

        btnSubmit.disabled = true;
        btnText.textContent = 'Mendaftar...';
        statusMsg.classList.add('d-none');

        const formData = new FormData(form);
        formData.append('is_final_submit', 1);

        try {
            await axios.post('/upload-berkas', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            statusMsg.textContent = 'Pendaftaran Berhasil! Data dan Berkas Anda telah kami terima.';
            statusMsg.className = 'mt-4 text-center alert alert-success';
            statusMsg.classList.remove('d-none');

            setTimeout(() => {
                window.location.href = "{{ route('ppdb.dashboard') }}";
            }, 2000);

        } catch (error) {
            console.error(error);
            let errMsg = 'Gagal mengirim berkas. Pastikan ukuran file tidak melebihi 2MB.';
            if (error.response && error.response.data.errors) {
                errMsg = Object.values(error.response.data.errors).flat().join('<br>');
            }
            statusMsg.innerHTML = errMsg;
            statusMsg.className = 'mt-4 text-center alert alert-danger';
            statusMsg.classList.remove('d-none');
        } finally {
            btnSubmit.disabled = false;
            btnText.textContent = 'Daftar';
        }
    });
</script>

@endsection