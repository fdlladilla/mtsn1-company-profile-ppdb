<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - MTsN 1 Paluta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="auth-page">

    <div class="auth-wrapper">
        
        <div class="auth-side-content">
            <div class="form-box">
                <!-- FORM 1: Minta Link (Jika tidak ada token di URL) -->
                <div id="forgotSection">
                    <form id="forgotPasswordForm">
                        <h2 class="auth-title">Lupa Password Admin</h2>
                        <p class="small text-muted mb-4">Masukkan email pendaftaran admin untuk menerima link reset.</p>
                        
                        <div class="mb-4 text-start">
                            <label class="form-label small fw-bold">Email Admin <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email_forgot" class="form-control auth-input-lg" placeholder="admin@example.com" required>
                        </div>

                        <div id="statusMessageForgot" class="mb-3 text-center d-none alert"></div>

                        <div class="text-center">
                            <button type="submit" class="btn-admin-login" id="btnForgot">
                                <span id="btnTextForgot">Kirim Link Reset</span>
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.login') }}" class="small text-decoration-none">Kembali ke Login</a>
                        </div>
                    </form>
                </div>

                <!-- FORM 2: Set Password Baru (Jika ada token di URL) -->
                <div id="resetSection" class="d-none">
                    <form id="resetPasswordForm">
                        <h2 class="auth-title">Set Password Baru</h2>
                        <p class="small text-muted mb-4">Silakan masukkan password baru untuk akun admin Anda.</p>

                        <input type="hidden" name="token" id="reset_token">
                        
                        <div class="mb-3 text-start">
                            <label class="form-label small fw-bold">Email Admin</label>
                            <input type="email" name="email" id="email_reset" class="form-control auth-input-lg" readonly>
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label small fw-bold">Password Baru <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control auth-input-lg" placeholder="Min. 6 Karakter" required>
                        </div>

                        <div class="mb-4 text-start">
                            <label class="form-label small fw-bold">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control auth-input-lg" placeholder="Ulangi Password" required>
                        </div>

                        <div id="statusMessageReset" class="mb-3 text-center d-none alert"></div>

                        <div class="text-center">
                            <button type="submit" class="btn-admin-login" id="btnReset">
                                <span id="btnTextReset">Simpan Password Baru</span>
                            </button>
                        </div>
                    </form>
                </div>

                @vite(['resources/js/app.js'])

                <script type="module">
                    const urlParams = new URLSearchParams(window.location.search);
                    const token = urlParams.get('token');
                    const email = urlParams.get('email');

                    const forgotSection = document.getElementById('forgotSection');
                    const resetSection = document.getElementById('resetSection');

                    // Tentukan form mana yang tampil
                    if (token && email) {
                        forgotSection.classList.add('d-none');
                        resetSection.classList.remove('d-none');
                        document.getElementById('reset_token').value = token;
                        document.getElementById('email_reset').value = email;
                    }

                    // --- LOGIKA FORGOT PASSWORD ---
                    const forgotForm = document.getElementById('forgotPasswordForm');
                    forgotForm.addEventListener('submit', async (e) => {
                        e.preventDefault();
                        const btn = document.getElementById('btnForgot');
                        const status = document.getElementById('statusMessageForgot');
                        
                        btn.disabled = true;
                        document.getElementById('btnTextForgot').innerText = 'Mengirim...';
                        status.classList.add('d-none');

                        try {
                            const response = await axios.post('/admin/forgot-password', { email: document.getElementById('email_forgot').value });
                            status.textContent = response.data.message;
                            status.className = 'mb-3 text-center alert alert-success';
                            status.classList.remove('d-none');
                        } catch (error) {
                            status.textContent = error.response?.data?.message || 'Gagal mengirim link reset.';
                            status.className = 'mb-3 text-center alert alert-danger';
                            status.classList.remove('d-none');
                        } finally {
                            btn.disabled = false;
                            document.getElementById('btnTextForgot').innerText = 'Kirim Link Reset';
                        }
                    });

                    // --- LOGIKA RESET PASSWORD ---
                    const resetForm = document.getElementById('resetPasswordForm');
                    resetForm.addEventListener('submit', async (e) => {
                        e.preventDefault();
                        const btn = document.getElementById('btnReset');
                        const status = document.getElementById('statusMessageReset');
                        
                        btn.disabled = true;
                        document.getElementById('btnTextReset').innerText = 'Menyimpan...';
                        status.classList.add('d-none');

                        const formData = new FormData(resetForm);
                        const data = Object.fromEntries(formData.entries());

                        try {
                            const response = await axios.post('/admin/reset-password', data);
                            status.textContent = response.data.message;
                            status.className = 'mb-3 text-center alert alert-success';
                            status.classList.remove('d-none');

                            setTimeout(() => {
                                window.location.href = "{{ route('admin.login') }}";
                            }, 2000);
                        } catch (error) {
                            status.textContent = error.response?.data?.message || 'Gagal mereset password. Token mungkin kedaluwarsa.';
                            status.className = 'mb-3 text-center alert alert-danger';
                            status.classList.remove('d-none');
                        } finally {
                            btn.disabled = false;
                            document.getElementById('btnTextReset').innerText = 'Simpan Password Baru';
                        }
                    });
                </script>
            </div>
        </div>

        <div class="auth-side-diagonal reset-mode">
            <div class="logo-fix reset-logo">
                <img src="{{ asset('images/logo-kemenag.png') }}" alt="Logo Kemenag">
                <h3 class="logo-text">MTsN 1 Padang Lawas Utara</h3>
            </div>
        </div>
    </div>
</body>
</html>