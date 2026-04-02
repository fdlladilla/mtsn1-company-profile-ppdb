@extends('layouts.user')

@section('title', 'Form Pendaftaran')

@section('content')

<section class="ppdb-section">
    <div class="container">
        <h1 class="ppdb-title-form">
            Formulir Pendaftaran Calon Siswa
        </h1>

        <form class="ppdb-form" id="diriForm">
            <h5 class="form-section-title text-start">
                C. Pengembangan Diri (Pilih Maksimal 4 Per Kategori)
            </h5>

            <div class="row g-3">
                @php
                    $pengembangan_diri = [
                        [
                            'kategori' => 'AGAMA',
                            'name'     => 'pengembangan_diri[agama][]',
                            'group'    => 'agama',
                            'col'      => 'col-md-4',
                            'items'    => [
                                ['label' => "Mengaji Al-Qur'an", 'val' => 'mengaji'],
                                ['label' => 'Doa Harian', 'val' => 'doa'],
                                ['label' => 'Praktik Ibadah', 'val' => 'ibadah'],
                                ['label' => 'Tahfidz Qur\'an', 'val' => 'tahfidz'],
                                ['label' => 'Tilawah', 'val' => 'tilawah'],
                                ['label' => 'Khat / Kaligrafi', 'val' => 'kaligrafi'],
                                ['label' => 'Hadist', 'val' => 'hadist'],
                            ]
                        ],
                        [
                            'kategori' => 'SAINS',
                            'name'     => 'pengembangan_diri[sains][]',
                            'group'    => 'sains',
                            'col'      => 'col-md-4',
                            'items'    => [
                                ['label' => 'IPA / Biologi', 'val' => 'ipa'],
                                ['label' => 'TIK / Komputer', 'val' => 'tik'],
                                ['label' => 'Matematika', 'val' => 'matematika'],
                                ['label' => 'Fisika', 'val' => 'fisika'],
                                ['label' => 'Astronomi', 'val' => 'astronomi'],
                                ['label' => 'Robotik', 'val' => 'robotik'],
                                ['label' => 'Karya Ilmiah', 'val' => 'kir'],
                            ]
                        ],
                        [
                            'kategori' => 'BAHASA',
                            'name'     => 'pengembangan_diri[bahasa][]',
                            'group'    => 'bahasa',
                            'col'      => 'col-md-4',
                            'items'    => [
                                ['label' => 'Bahasa Inggris', 'val' => 'inggris'],
                                ['label' => 'Bahasa Arab', 'val' => 'arab'],
                                ['label' => 'Bahasa Mandarin', 'val' => 'mandarin'],
                                ['label' => 'Bahasa Jepang', 'val' => 'jepang'],
                                ['label' => 'Bahasa Indonesia (Pidato)', 'val' => 'pidato'],
                                ['label' => 'Debat', 'val' => 'debat'],
                            ]
                        ],
                        [
                            'kategori' => 'OLAHRAGA',
                            'name'     => 'pengembangan_diri[olahraga][]',
                            'group'    => 'olahraga',
                            'col'      => 'col-md-6',
                            'items'    => [
                                ['label' => 'Voli', 'val' => 'voli'],
                                ['label' => 'Badminton', 'val' => 'badminton'],
                                ['label' => 'Atletik / Lari', 'val' => 'atletik'],
                                ['label' => 'Tenis Meja', 'val' => 'tenis_meja'],
                                ['label' => 'Futsal / Bola', 'val' => 'futsal'],
                                ['label' => 'Basket', 'val' => 'basket'],
                                ['label' => 'Renang', 'val' => 'renang'],
                                ['label' => 'Memanah', 'val' => 'memanah'],
                                ['label' => 'Seni Bela Diri', 'val' => 'beladiri'],
                            ]
                        ],
                        [
                            'kategori' => 'KEGIATAN EKSTRA',
                            'name'     => 'pengembangan_diri[ekstra][]',
                            'group'    => 'ekstra',
                            'col'      => 'col-md-6',
                            'items'    => [
                                ['label' => 'Pramuka', 'val' => 'pramuka'],
                                ['label' => 'Dokter Remaja / PMR', 'val' => 'pmr'],
                                ['label' => 'Nasyid / Hadroh', 'val' => 'nasyid'],
                                ['label' => 'Paskibra', 'val' => 'paskibra'],
                                ['label' => 'Seni Tari', 'val' => 'tari'],
                                ['label' => 'Paduan Suara', 'val' => 'paduan_suara'],
                                ['label' => 'Jurnalistik', 'val' => 'jurnalistik'],
                                ['label' => 'Pencinta Alam', 'val' => 'pencinta_alam'],
                            ]
                        ],
                    ];
                @endphp

                @foreach($pengembangan_diri as $kat)
                <div class="{{ $kat['col'] }}">
                    <div class="checkbox-box">
                        <h6>{{ $kat['kategori'] }}</h6>
                        @foreach($kat['items'] as $item)
                        <div class="checkbox-item">
                            <label>{{ $item['label'] }}</label>
                            <input type="checkbox" name="{{ $kat['name'] }}" value="{{ $item['val'] }}" data-group="{{ $kat['group'] }}" class="check-group">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <h5 class="form-section-title text-start mt-4">
                D. Cita-cita
            </h5>

            <div class="row">
                <div class="col-md-12">
                    <label class="fw-bold small">Cita-cita Anda<span class="text-danger">*</span></label>
                    <textarea name="cita_cita" id="cita_cita" class="form-control cita-textarea" required placeholder="Tuliskan cita-cita kamu..."></textarea>
                </div>
            </div>

            <div id="statusMessage" class="mt-4 text-center d-none alert"></div>

            <div class="d-flex justify-content-end mt-5 gap-2">
                <a href="{{ route('ppdb.pendaftaran.data') }}" class="btn-cancel">
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
    const form = document.getElementById('diriForm');
    const btnSave = document.getElementById('btnSave');
    const btnText = document.getElementById('btnText');
    const statusMsg = document.getElementById('statusMessage');

    // 1. Enforce Max 4 Checkboxes per Group
    const checkboxes = document.querySelectorAll('.check-group');
    checkboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const group = this.dataset.group;
            const checkedInGroup = document.querySelectorAll(`.check-group[data-group="${group}"]:checked`);
            if (checkedInGroup.length > 4) {
                this.checked = false;
                alert('Maksimal 4 pilihan per kategori ya!');
            }
        });
    });

    // 2. Load Data yang sudah ada
    async function loadData() {
        try {
            const response = await axios.get('/pendaftaran-data');
            const data = response.data.data_pendaftaran;

            if (data) {
                // Isi Cita-cita
                if (data.cita_cita) {
                    document.getElementById('cita_cita').value = data.cita_cita;
                    // Auto-resize textarea
                    const txt = document.getElementById('cita_cita');
                    txt.style.height = "auto";
                    txt.style.height = txt.scrollHeight + "px";
                }

                // Centang Checkbox Pengembangan Diri
                if (data.pengembangan_diri) {
                    const pd = data.pengembangan_diri;
                    Object.keys(pd).forEach(group => {
                        pd[group].forEach(val => {
                            const cb = document.querySelector(`.check-group[data-group="${group}"][value="${val}"]`);
                            if (cb) cb.checked = true;
                        });
                    });
                }
            }
        } catch (error) {
            console.error('Gagal memuat data:', error);
        }
    }

    loadData();

    // 3. Simpan Data
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        btnSave.disabled = true;
        btnText.textContent = 'Menyimpan...';
        statusMsg.classList.add('d-none');

        // Gunakan FormData untuk mengambil data array
        const formData = new FormData(form);
        
        // Backend mengharap 'pengembangan_diri' sebagai objek/array JSON
        // Kita bisa kirim sebagai JSON langsung via Axios
        const cita_cita = formData.get('cita_cita');
        
        // Manual collecting checkboxes grouping
        const groups = ['agama', 'sains', 'bahasa', 'olahraga', 'ekstra'];
        const pdData = {};
        groups.forEach(g => {
            const checked = Array.from(document.querySelectorAll(`.check-group[data-group="${g}"]:checked`)).map(el => el.value);
            pdData[g] = checked;
        });

        try {
            await axios.post('/pendaftaran-data', {
                ...Object.fromEntries(formData.entries()), // fields lain (jika ada)
                cita_cita: cita_cita,
                pengembangan_diri: pdData
            });

            statusMsg.textContent = 'Data pendaftaran diri berhasil disimpan!';
            statusMsg.className = 'mt-4 text-center alert alert-success';
            statusMsg.classList.remove('d-none');

            setTimeout(() => {
                window.location.href = "{{ route('ppdb.pendaftaran.form') }}";
            }, 1500);

        } catch (error) {
            console.error(error);
            statusMsg.textContent = 'Gagal menyimpan data. Silakan coba lagi.';
            statusMsg.className = 'mt-4 text-center alert alert-danger';
            statusMsg.classList.remove('d-none');
        } finally {
            btnSave.disabled = false;
            btnText.textContent = 'Simpan & Selanjutnya';
        }
    });

    // Auto-resize textarea logic
    const textarea = document.querySelector(".cita-textarea");
    textarea.addEventListener("input", function () {
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    });
</script>

@endsection