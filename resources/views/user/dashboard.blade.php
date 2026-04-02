@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')

<section class="hero-section position-relative text-white text-center d-flex align-items-center">
    <img src="{{ asset('images/tes.jpeg') }}" class="hero-image">
    <div class="container position-relative">
        <h1 class="hero-title text-center">
            Madrasah Unggul & Berkarakter
        </h1>
        <p class="hero-subtitle text-center">
            Mewujudkan generasi berilmu, berakhlak mulia, dan berprestasi
        </p>
    </div>
</section>

<section class="section-light py-5">
    <div class="container">
        <h3 class="section-title text-center text-green mb-5">
            KEPALA MTsN 1 PADANG LAWAS UTARA
        </h3>

        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/kepala_sekolah.png') }}" class="img-fluid rounded shadow">
            </div>

            <div class="col-md-8 sambutan-text">
                <h2 class="salam-opening mb-4">
                    Assalamu’alaikum Warahmatullahi Wabarakatuh
                </h2>
                <p>
                    Alhamdulillahi Rabbil ‘Alamin, puji dan syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya, 
                    MTsN 1 Padang Lawas Utara dapat menghadirkan  website resmi madrasah sebagai sarana informasi, komunikasi, dan publikasi kegiatan pendidikan.
                    Website ini merupakan bagian dari komitmen kami dalam mewujudkan visi madrasah, yaitu  “Terwujudnya Sumber Daya Cerdas, Berkarakter Islam, dan Berdaya Saing Global.”  
                    Di era digital saat ini, pemanfaatan teknologi informasi menjadi kebutuhan utama dalam  meningkatkan mutu layanan pendidikan yang profesional, transparan, dan akuntabel.
                </p>
                <p>
                    Melalui website ini, kami berharap masyarakat, orang tua, peserta didik, alumni, 
                    dan seluruh stakeholder dapat memperoleh informasi yang akurat dan terkini tentang 
                    program, kegiatan, prestasi, serta perkembangan MTsN 1 Padang Lawas Utara. 
                    Website ini juga menjadi wadah publikasi karya, inovasi, dan prestasi siswa maupun guru.
                </p>
                <p>
                    Kami menyadari bahwa kemajuan madrasah tidak dapat dicapai tanpa kolaborasi dan dukungan semua pihak. 
                    Oleh karena itu, kami mengajak seluruh civitas madrasah dan masyarakat untuk bersama-sama 
                    memanfaatkan dan mengembangkan website ini sebagai media komunikasi yang positif dan produktif.
                </p>
                <p>
                    Akhir kata, kami mengucapkan terima kasih kepada tim pengembang website serta semua pihak 
                    yang telah berkontribusi dalam terwujudnya media digital ini. Semoga website MTsN 1 Padang Lawas Utara 
                    dapat menjadi jendela informasi yang membawa manfaat dan keberkahan bagi kita semua.
                </p>
                <h2 class="salam-closing mt-4">
                    Wassalamu’alaikum Warahmatullahi Wabarakatuh.
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="section-light py-5">
    <div class="container">
        <h3 class="section-title text-center text-green mb-5">
            Visi & Misi MTsN 1 Padang Lawas Utara
        </h3>

        <div class="row visi-misi g-4">
            <div class="col-md-6">
                <div class="card-custom">
                    <h1 class="text-center text-green fw-bold">Visi</h1>
                    <p class="lead-text">
                        “Terwujudnya Sumber Daya Cerdas, Berkarakter Islam, dan Berdaya Saing Global.”
                    </p>
                    <p><strong>Penjelasan Visi:</strong></p>
                    <p>
                        Visi ini menggambarkan cita-cita besar madrasah dalam membentuk peserta didik yang:
                    </p>
                    
                    <ol>
                        @php
                            $visi_items = [
                                'Cerdas' => 'Memiliki kemampuan akademik yang baik, berpikir kritis, kreatif, serta mampu menyelesaikan masalah sesuai perkembangan zaman.',
                                'Berkarakter Islam' => 'Menjadikan nilai-nilai ajaran Islam sebagai landasan dalam bersikap, berperilaku, dan mengambil keputusan. Akhlakul karimah menjadi identitas utama peserta didik.',
                                'Berdaya Saing Global' => 'Mampu bersaing di tingkat nasional maupun internasional melalui penguasaan ilmu pengetahuan, teknologi, bahasa, dan prestasi.'
                            ];
                        @endphp
                        @foreach($visi_items as $title => $desc)
                            <li>{{ $title }} <span>{{ $desc }}</span></li>
                        @endforeach
                    </ol>

                    <p>
                        Visi ini menunjukkan bahwa MTsN 1 Padang Lawas Utara tidak hanya fokus pada kecerdasan akademik, tetapi juga pembentukan karakter dan kesiapan menghadapi tantangan global.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-custom">
                    <h1 class="section-heading">Misi</h1>

                    <ol>
                        @php
                            $misi_items = [
                                'Mutu Akademik & Literasi' => 'Madrasah berkomitmen meningkatkan kualitas pembelajaran, hasil ujian, dan budaya literasi (membaca, menulis, berpikir kritis). Termasuk penguatan numerasi dan kemampuan analisis peserta didik.',
                                'Karakter Islam & Akhlakul Karimah' => 'Menanamkan nilai-nilai keislaman melalui pembiasaan ibadah, disiplin, kejujuran, tanggung jawab, serta sikap santun dalam kehidupan sehari-hari di madrasah maupun di masyarakat.',
                                'Tata Kelola Profesional' => 'Mengelola madrasah secara transparan, tertib administrasi, sesuai regulasi Kementerian Agama, serta siap audit. Mengedepankan manajemen berbasis kinerja dan pelayanan prima.',
                                'Daya Saing Global' => 'Meningkatkan kemampuan teknologi informasi, penguasaan bahasa (Arab dan Inggris), serta mendorong peserta didik mengikuti berbagai kompetisi akademik maupun non-akademik.',
                                'Kolaborasi' => 'Membangun kemitraan yang kuat dengan komite madrasah, orang tua, tokoh masyarakat, dan instansi terkait untuk mendukung kemajuan dan pengembangan madrasah secara berkelanjutan.'
                            ];
                        @endphp
                        @foreach($misi_items as $title => $desc)
                            <li>{{ $title }} <span>{{ $desc }}</span></li>
                        @endforeach
                    </ol>

                </div>
            </div>
        </div>

        <div class="row moto mt-4">
            <div class="col-12">
                <div class="card-custom">
                    <h1 class="section-heading">Motto</h1>
                    
                    <p class="moto-title">
                        “Bersama Membangun Madrasah Bermutu, Berkarakter, dan Mendunia.”
                    </p>

                    <div class="moto-text">
                        @php
                            $motto_points = [
                                "Keberhasilan madrasah adalah hasil kerja sama seluruh unsur (kepala madrasah, guru, tenaga kependidikan, komite, orang tua, dan masyarakat).",
                                "Fokus pada mutu pendidikan, bukan hanya administratif tetapi juga kualitas lulusan.",
                                "Menanamkan karakter kuat dan religius.",
                                "Berorientasi pada prestasi dan pengakuan di tingkat yang lebih luas (mendunia)."
                            ];
                        @endphp

                        @foreach($motto_points as $point)
                            <p>{{ $point }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="section-light py-5 text-center">
    <div class="container">
        <h2 class="section-title fw-bold mb-5">Kurikulum</h2>
        <div class="row g-4">
            @php
                $kurikulum = [
                    ['title' => 'Program Akademik', 'desc' => 'Deskripsi kurikulum akademik...'],
                    ['title' => 'Program Keagamaan', 'desc' => 'Deskripsi kurikulum keagamaan...'],
                    ['title' => 'Ekstrakurikuler', 'desc' => 'Deskripsi kurikulum ekstra...']
                ];
            @endphp
            @foreach($kurikulum as $item)
            <div class="col-md-4">
                <div class="card-custom">
                    <h5>{{ $item['title'] }}</h5>
                    <p>{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-light py-5 text-center">
    <div class="container">
        <h2 class="section-title fw-bold mb-5">Lokasi Madrasah</h2>

        <div class="row g-4">
            <div class="col-md-6"> 
                <a href="https://maps.app.goo.gl/u5qUgBByKkgW1g9cA?g_st=aw" target="_blank" class="madrasah-loc-link">
                    <div class="madrasah-map-box">
                        <img src="{{ asset('images/gedung-a.jpeg') }}" class="img-fluid madrasah-img">
                        <div class="madrasah-details">
                            <h5>Gedung A</h5>
                            <p>Desa Naga Saribu, Kec. Padang Bolak Tenggara, 
                                Kabupaten Padang Lawas Utara, Sumatera Utara 22753</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6"> 
                <a href="https://maps.app.goo.gl/hhFFRedKUj8umVtb6?g_st=aw" target="_blank" class="madrasah-loc-link">
                    <div class="madrasah-map-box">
                        <img src="{{ asset('images/gedung-b.jpeg') }}" class="img-fluid madrasah-img">
                        <div class="madrasah-details">
                            <h5>Gedung B</h5>
                            <p>Batang Onang, Jl. Lintas Sosopan, Desa Simangambat Dolok, Kec. Batang Onang, 
                                Kabupaten Padang Lawas Utara, Sumatera Utara 22733</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section-light text-center">
    <div class="container">
        <h2 class="section-title fw-bold mb-5">Aktivitas Madrasah</h2>
        <div class="row g-4">
            @for($i=1;$i<=6;$i++)
            <div class="col-md-4">
                <img src="{{ asset('images/aktivitas/aktivitas'.$i.'.jpg') }}" 
                    class="img-fluid rounded shadow aktivitas-img">
            </div>
            @endfor
        </div>
    </div>
</section>
@endsection