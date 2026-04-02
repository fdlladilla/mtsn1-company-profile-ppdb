@extends('layouts.user')

@section('title', 'Pilih Lokasi Sekolah')

@section('content')

<section class="ppdb-section text-center">
    <div class="container">
        <div class="location-box">
            <h2 class="location-title">Pilih Lokasi Sekolah</h2>
            <p class="location-subtitle">Silakan pilih lokasi sekolah tujuan terlebih dahulu</p>

            <form id="locationForm">
                @csrf
                <div class="location-options">
                    <label class="location-card">
                        <input type="radio" name="gedung" value="Gedung A" id="gedungA" required>
                        <span class="custom-radio"></span>
                        <div class="location-text">
                            <span class="gedung-name">Gedung A</span>
                            <p class="gedung-address">Desa Naga Saribu, Kec. Padang Bolak Tenggara, Kabupaten Padang Lawas Utara, Sumatera Utara 22753</p>
                        </div>
                    </label>

                    <label class="location-card">
                        <input type="radio" name="gedung" value="Gedung B" id="gedungB">
                        <span class="custom-radio"></span>
                        <div class="location-text">
                            <span class="gedung-name">Gedung B</span>
                            <p class="gedung-address">Batang Onang, Jl. Lintas Sosopan, Desa Simangambat Dolok, Kec. Batang Onang, Kabupaten Padang Lawas Utara, Sumatera Utara 22733</p>
                        </div>
                    </label>
                </div>

                <div id="statusMessage" class="mt-3 text-center d-none alert"></div>

                <div class="d-flex justify-content-end mt-5 gap-2">
                    <a href="{{ route('ppdb.dashboard') }}" class="btn-cancel">
                        Kembali
                    </a>

                    <button type="submit" class="btn-submit" id="btnNext">
                        <span id="btnText">Selanjutnya</span>
                    </button>
                </div>
            </form>

            @vite(['resources/js/app.js'])

            <script type="module">
                const btnNext = document.getElementById('btnNext');
                const btnText = document.getElementById('btnText');
                const statusMsg = document.getElementById('statusMessage');

                // 1. Ambil pilihan lama saat halaman dimuat
                async function loadCurrentLocation() {
                    try {
                        const response = await axios.get('/user');
                        const pendaftaran = response.data;
                        if (pendaftaran.pilihan_gedung === 'Gedung A') {
                            document.getElementById('gedungA').checked = true;
                        } else if (pendaftaran.pilihan_gedung === 'Gedung B') {
                            document.getElementById('gedungB').checked = true;
                        }
                    } catch (error) {
                        console.error('Gagal memuat data user:', error);
                    }
                }

                loadCurrentLocation();

                // 2. Simpan pilihan baru saat klik "Selanjutnya"
                document.getElementById('locationForm').addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const selectedGedung = document.querySelector('input[name="gedung"]:checked').value;

                    btnNext.disabled = true;
                    btnText.textContent = 'Menyimpan...';
                    statusMsg.classList.add('d-none');

                    try {
                        await axios.post('/pilihan-gedung', {
                            pilihan_gedung: selectedGedung
                        });

                        statusMsg.textContent = 'Pilihan berhasil disimpan!';
                        statusMsg.className = 'mt-3 text-center alert alert-success';
                        statusMsg.classList.remove('d-none');

                        // Pindah ke halaman berikutnya
                        setTimeout(() => {
                            window.location.href = "{{ route('ppdb.pendaftaran.data') }}";
                        }, 1000);

                    } catch (error) {
                        console.error(error);
                        statusMsg.textContent = 'Gagal menyimpan pilihan. Silakan coba lagi.';
                        statusMsg.className = 'mt-3 text-center alert alert-danger';
                        statusMsg.classList.remove('d-none');
                    } finally {
                        btnNext.disabled = false;
                        btnText.textContent = 'Selanjutnya';
                    }
                });
            </script>
        </div>
    </div>
</section>
@endsection