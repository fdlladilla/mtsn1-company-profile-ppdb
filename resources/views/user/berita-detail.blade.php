@extends('layouts.user')

@section('title', 'Detail Berita')

@section('content')

@php
    $berita_list = [
        [
            'judul' => 'Maulid Nabi 1446 H',
            'desc' => 'Peringatan Maulid Nabi Muhammad SAW di madrasah diisi dengan pembacaan sholawat, ceramah agama, dan tausiyah. Seluruh warga madrasah berkumpul untuk meneladani akhlak Rasulullah SAW.',
            'content' => 'Peringatan Maulid Nabi Muhammad SAW di MTsN 1 Padang Lawas Utara berlangsung khidmat dan penuh makna. Kegiatan yang dilaksanakan pada hari ini diikuti oleh seluruh siswa, dewan guru, dan staf kependidikan.

Acara diawali dengan pembacaan ayat suci Al-Qur\'an, dilanjutkan dengan lantunan sholawat nabi yang dibawakan oleh grup hadroh madrasah. Suasana religius terasa kental saat seluruh hadirin turut bersholawat bersama.

Kepala Madrasah dalam sambutannya menyampaikan bahwa peringatan ini bukan sekadar rutinitas tahunan, melainkan momentum untuk berefleksi dan meneladani akhlak mulia Nabi Muhammad SAW dalam kehidupan sehari-hari, terutama bagi para siswa dalam menuntut ilmu.

Acara inti diisi dengan tausiyah agama oleh Ustadz yang diundang khusus. Beliau memaparkan tentang kisah perjuangan Rasulullah dan pentingnya menjaga adab serta etika sebagai penuntut ilmu. Kegiatan ditutup dengan doa bersama dan makan bersama sebagai wujud rasa syukur dan kebersamaan antar warga madrasah.',
            'gambar' => 'maulid_nabi.png',
            'tanggal' => '12 Desember 2026',
            'kategori' => 'Kegiatan Keagamaan'
        ],
        [
            'judul' => 'Lomba Adzan Tingkat Kabupaten',
            'desc' => 'Siswa MTsN 1 Padang Lawas Utara berhasil meraih juara dalam ajang Lomba Adzan tingkat Kabupaten yang diselenggarakan baru-baru ini.',
            'content' => 'Prestasi membanggakan kembali diukir oleh siswa MTsN 1 Padang Lawas Utara. Dalam ajang Festival Anak Sholeh tingkat Kabupaten yang digelar minggu lalu, perwakilan madrasah kami berhasil menyabet gelar Juara 1 pada cabang Lomba Adzan.

Persiapan yang matang selama berminggu-minggu di bawah bimbingan guru seni baca Al-Qur\'an membuahkan hasil yang manis. Suara lantang dan makhraj yang fasih menjadi nilai tambah utama yang membawa kemenangan bagi delegasi madrasah.

"Kemenangan ini adalah hasil kerja keras siswa dan doa dari seluruh Bapak Ibu Guru. Kami berharap prestasi ini dapat memotivasi siswa lainnya untuk berani menunjukkan bakat dan minat mereka di berbagai bidang," ujar Wakil Kepala Madrasah Bidang Kesiswaan.

Pihak sekolah memberikan apresiasi setinggi-tingginya kepada pemenang. Penyerahan piala dilakukan dalam upacara bendera hari Senin kemarin sebagai bentuk penghargaan dan motivasi bagi seluruh siswa madrasah.',
            'gambar' => 'maulid_nabi.png', // Ganti sesuai nama file aslinya nanti
            'tanggal' => '15 November 2026',
            'kategori' => 'Prestasi'
        ],
        [
            'judul' => 'Rapat Komite Semester Ganjil',
            'desc' => 'Madrasah menyelenggarakan rapat rutin bersama komite sekolah dan wali murid guna membahas program kerja pendidikan untuk semester ganjil.',
            'content' => 'Dalam rangka meningkatkan sinergi antara pihak madrasah dengan wali murid, MTsN 1 Padang Lawas Utara menyelenggarakan Rapat Komite Semester Ganjil Tahun Ajaran 2026/2027. Rapat yang bertempat di aula utama dihadiri oleh jajaran pengurus komite dan perwakilan wali murid tiap kelas.

Agenda utama rapat kali ini adalah pemaparan rencana strategis madrasah, pengembangan fasilitas penunjang pembelajaran, serta evaluasi program kesiswaan. Kepala Madrasah menekankan pentingnya peran aktif orang tua dalam memantau perkembangan belajar anak di rumah.

"Kerja sama yang baik antara guru dan orang tua adalah kunci keberhasilan pendidikan. Kami ingin memastikan setiap program yang kami jalankan mendapat dukungan penuh dari wali murid," ungkap beliau.

Rapat berlangsung interaktif dengan adanya sesi tanya jawab. Banyak masukan positif dari wali murid mengenai peningkatan kualitas ekstrakurikuler dan disiplin siswa. Hasil kesepakatan rapat diharapkan dapat segera diimplementasikan demi kemajuan madrasah ke depan.',
            'gambar' => 'maulid_nabi.png',
            'tanggal' => '20 Oktober 2026',
            'kategori' => 'Informasi Sekolah'
        ],
    ];

    $id = request()->route('id');
    $berita = isset($berita_list[$id]) ? $berita_list[$id] : $berita_list[0];
@endphp

<section class="news-detail-section py-5">
    <div class="container py-lg-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <!-- Back Link -->
                <div class="mb-4">
                    <a href="{{ route('berita.index') }}" class="back-link text-decoration-none">
                        <i class="bi bi-arrow-left-short fs-4"></i>
                        <span>Kembali ke Berita</span>
                    </a>
                </div>

                <article class="news-article">
                    <!-- Meta Info -->
                    <div class="news-meta mb-3">
                        <span class="badge news-badge mb-3">{{ $berita['kategori'] }}</span>
                        <h1 class="news-main-title fw-bold">{{ $berita['judul'] }}</h1>
                        <div class="news-info d-flex align-items-center gap-3 text-muted">
                            <span><i class="bi bi-calendar3 me-2"></i>{{ $berita['tanggal'] }}</span>
                            <span><i class="bi bi-person me-2"></i>Admin Madrasah</span>
                        </div>
                    </div>

                    <!-- Main Image -->
                    <div class="news-hero-wrapper mb-5 shadow-sm">
                        <img src="{{ asset('images/berita/' . $berita['gambar']) }}" alt="{{ $berita['judul'] }}" class="img-fluid rounded-4 w-100">
                    </div>

                    <!-- Content -->
                    <div class="news-main-content">
                        {!! nl2br(e($berita['content'])) !!}
                    </div>

                    <hr class="my-5">

                    <!-- Share Section (Visual Only) -->
                    <div class="share-article d-flex align-items-center gap-3">
                        <span class="fw-bold">Bagikan:</span>
                        <div class="share-icons d-flex gap-2">
                            <a href="#" class="btn btn-outline-success btn-sm rounded-circle"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-outline-info btn-sm rounded-circle"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

@endsection
