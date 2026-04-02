@extends('layouts.user')

@section('title','PPDB Register')

@section('content')

<section class="ppdb-section">
    <div class="container">
        <h1 class="ppdb-title">
            Penerimaan Peserta Didik Baru
        </h1>

        <div class="akun-form">
            <h5>Daftar Akun</h5>
            <form id="registerForm">
                @csrf
                <div class="mb-4 text-start">
                    <label class="fw-bold mb-1 d-block">Nama Lengkap<span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap" class="form-control" required>
                </div>
                <div class="mb-4 text-start">
                    <label class="fw-bold mb-1 d-block">NISN<span class="text-danger">*</span></label>
                    <input type="text" name="nisn" placeholder="Masukan No NISN" class="form-control" required>
                </div>
                <div class="mb-4 text-start">
                    <label class="fw-bold mb-1 d-block">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" placeholder="Masukan Email" class="form-control" required>
                </div>
                <div class="mb-4 text-start">
                    <label class="fw-bold mb-1 d-block">Password<span class="text-danger">*</span></label>
                    <input type="password" name="password" placeholder="Masukan Password" class="form-control" required>
                </div>
                <div class="mb-4 text-start">
                    <label class="fw-bold mb-1 d-block">Konfirmasi Password<span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" placeholder="Masukan Ulang Password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-end mt-3 gap-3">
                    <a href="{{ route('ppdb.menu') }}" class="btn-cancel text-decoration-none d-inline-flex align-items-center justify-content-center">
                        Kembali
                    </a>
                    <button type="submit" class="btn-submit" id="btnSubmit">
                        Daftar
                    </button>
                </div>
            </form>

            {{-- Pesan Status --}}
            <div id="registerMessage" class="mt-3 text-center d-none alert"></div>

            @vite(['resources/js/app.js'])

            <script type="module">
                document.getElementById('registerForm').addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const btn = document.getElementById('btnSubmit');
                    const msg = document.getElementById('registerMessage');
                    
                    btn.disabled = true;
                    btn.innerText = 'Mendaftar...';
                    msg.classList.add('d-none');

                    const formData = new FormData(e.target);
                    const data = Object.fromEntries(formData.entries());

                    try {
                        // 2. Kirim Request Registrasi (Stateless, No CSRF needed)
                        const response = await axios.post('/register', data);
                        
                        // Simpan Token agar otomatis login pelan-pelan
                        if (response.data.token) {
                            localStorage.setItem('ppdb_token', response.data.token);
                        }

                        msg.textContent = 'Registrasi Berhasil! Mengalihkan ke Dashboard...';
                        msg.className = 'mt-3 text-center alert alert-success';
                        msg.classList.remove('d-none');

                        setTimeout(() => {
                            window.location.href = "{{ route('ppdb.dashboard') }}";
                        }, 2000);

                    } catch (error) {
                        console.error('Registration error:', error);
                        let errMsg = 'Terjadi kesalahan saat pendaftaran.';
                        
                        if (error.response) {
                            if (error.response.data.errors) {
                                errMsg = Object.values(error.response.data.errors).flat().join('<br>');
                            } else if (error.response.data.message) {
                                errMsg = error.response.data.message;
                            }
                        } else if (error.request) {
                            errMsg = 'Tidak ada respon dari server. Pastikan Backend (Port 8000) sudah menyala.';
                        } else {
                            errMsg = error.message;
                        }
                        
                        msg.innerHTML = errMsg;
                        msg.className = 'mt-3 text-center alert alert-danger';
                        msg.classList.remove('d-none');
                    } finally {
                        btn.disabled = false;
                        btn.innerText = 'Daftar';
                    }
                });
            </script>
        </div>
    </div>
</section>
@endsection