<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - MTsN 1 Paluta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="auth-page">

    <div class="auth-wrapper">
        
        <div class="auth-side-diagonal">
            <div class="logo-fix">
                <img src="{{ asset('images/logo-kemenag.png') }}" alt="Logo Kemenag">
                <h3 class="logo-text">MTsN 1 Padang Lawas Utara</h3>
            </div>
        </div>

        <div class="auth-side-content">
            <div class="form-box">
                <form id="adminLoginForm">
                    <h2 class="auth-title">Login <br> Sekarang Juga!</h2>
                    
                    <div class="mb-4 text-start">
                        <label class="form-label small fw-bold" style="color: #000;">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control auth-input-lg" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-4 text-start">
                        <label class="form-label small fw-bold" style="color: #000;">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control auth-input-lg" placeholder="Masukkan Password" required>
                    </div>

                    <div class="text-end mb-4">
                        <a href="{{ route('admin.reset') }}" class="forgot-link">Lupa password?</a>
                    </div>

                    <div id="statusMessage" class="mb-3 text-center d-none alert"></div>

                    <div class="text-center">
                        <button type="submit" class="btn-admin-login" id="btnLogin">
                            <span id="btnText">Login</span>
                        </button>
                    </div>
                </form>

                @vite(['resources/js/app.js'])

                <script type="module">
                    const form = document.getElementById('adminLoginForm');
                    const btnLogin = document.getElementById('btnLogin');
                    const btnText = document.getElementById('btnText');
                    const statusMsg = document.getElementById('statusMessage');

                    form.addEventListener('submit', async (e) => {
                        e.preventDefault();
                        
                        btnLogin.disabled = true;
                        btnText.innerText = 'Loading...';
                        statusMsg.classList.add('d-none');

                        const formData = new FormData(form);
                        const data = Object.fromEntries(formData.entries());

                        try {
                            const response = await axios.post('/admin/login', data);
                            const result = response.data;
                            
                            if (result.success) {
                                localStorage.setItem('admin_token', result.data.admin_token);
                                
                                statusMsg.textContent = 'Login Berhasil! Mengalihkan...';
                                statusMsg.className = 'mb-3 text-center alert alert-success';
                                statusMsg.classList.remove('d-none');

                                setTimeout(() => {
                                    window.location.href = "{{ route('admin.dashboard') }}";
                                }, 1500);
                            }
                        } catch (error) {
                            console.error(error);
                            let errMsg = 'Login Gagal. Periksa kembali Email dan Password.';
                            if (error.response && error.response.data.message) {
                                errMsg = error.response.data.message;
                            }
                            statusMsg.textContent = errMsg;
                            statusMsg.className = 'mb-3 text-center alert alert-danger';
                            statusMsg.classList.remove('d-none');
                        } finally {
                            btnLogin.disabled = false;
                            btnText.innerText = 'Login';
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html>