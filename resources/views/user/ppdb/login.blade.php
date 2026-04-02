@extends('layouts.user')

@section('title','PPDB Login')

@section('content')

<section class="ppdb-section">
    <div class="container">
        <h1 class="ppdb-title">
            Penerimaan Peserta Didik Baru
        </h1>

        <div class="akun-form">
            <h5 class="mb-4">Login</h5>
            <form id="loginForm">
                @csrf
                <div class="mb-4 text-start">
                    <label class="fw-bold mb-1 d-block">NISN<span class="text-danger">*</span></label>
                    <input type="text" id="nisn" name="nisn" placeholder="Masukan No NISN" class="form-control" required>
                </div>
                <div class="mb-4 text-start">
                    <label class="fw-bold mb-1 d-block">Password<span class="text-danger">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Masukan Password" class="form-control" required>
                </div>

                <div class="text-end mt-2">
                    <a href="{{ route('ppdb.reset') }}" class="forgot-password">
                        Lupa password?
                    </a>
                </div>

                <div id="message" class="mt-3 text-center d-none alert"></div>

                <div class="d-flex justify-content-end mt-3 gap-3">
                    <a href="{{ route('ppdb.menu') }}" class="btn-cancel text-decoration-none d-inline-flex align-items-center justify-content-center">
                        Kembali
                    </a>
                    <button type="submit" class="btn-submit" id="btnLogin">
                        <span id="btnText">Masuk</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</section>

{{-- Masukkan Vite untuk Axios --}}
@vite(['resources/js/app.js'])

<script type="module">
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const nisn = document.getElementById('nisn').value;
        const password = document.getElementById('password').value;
        const btn = document.getElementById('btnLogin');
        const btnText = document.getElementById('btnText');
        const message = document.getElementById('message');

        btn.disabled = true;
        btnText.textContent = 'Memproses...';
        message.classList.add('d-none');

        try {
            // 2. Login request (Backend tidak butuh CSRF karena stateless)
            const response = await axios.post('/login', {
                nisn: nisn,
                password: password
            });

            // Simpan Token di LocalStorage agar otomatis dikirim Axios
            if (response.data.token) {
                localStorage.setItem('ppdb_token', response.data.token);
            }

            message.textContent = 'Login Berhasil! Mengalihkan...';
            message.className = 'mt-3 text-center alert alert-success';
            message.classList.remove('d-none');

            setTimeout(() => {
                window.location.href = "{{ route('ppdb.dashboard') }}";
            }, 1000);

        } catch (error) {
            console.error(error);
            let errorMsg = 'Login Gagal. Periksa kembali NISN dan password.';
            if (error.response && error.response.data.message) {
                errorMsg = error.response.data.message;
            }
            
            message.textContent = errorMsg;
            message.className = 'mt-3 text-center alert alert-danger';
            message.classList.remove('d-none');
        } finally {
            btn.disabled = false;
            btnText.textContent = 'Masuk';
        }
    });
</script>
@endsection