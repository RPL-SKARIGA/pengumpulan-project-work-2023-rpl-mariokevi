@extends('layout.navbar')

@section('content')
    <div class="container">
        <!-- Your content goes here -->
    </div>
    <div id="home" class="container-fluid">
    <!-- Konten Carousel -->

    {{-- Add the image slider below the navbar --}}
    <div class="container-fluid">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/2.png" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="/img/slide1.png" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="/img/slide2.png" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
        </div>
    </div>

    </div>
    <div id="daftarSection" class="container mt-4 text-center" style="background: linear-gradient(to left, #eef8ff, #ffffff); padding: 20px; box-sizing: border-box;">
    <!-- Konten Daftar -->

    <div class="container mt-4 text-center" style="background: linear-gradient(to left, #eef8ff, #ffffff); padding: 20px; box-sizing: border-box;">
    <h2 style="margin-bottom: 20px;">DAFTAR</h2>

    <div class="d-flex justify-content-end">
        <!-- Gambar di sebelah kiri -->
        <div style="flex: 1; margin-right: 20px;">
            <img src="/img/daftar.png" alt="Gambar" style="max-width: 100%; height: auto;">
        </div>
        <!-- Kata-kata di samping gambar -->
        <div style="flex: 1; text-align: left;">
            <h4 style="margin-top: 0;">DAFTAR ONLINE</h4>
            <p>
                Pendafataran online dilakukan untuk mempurmudah anda. Untuk pendaftaran online dan cari data cek kesehatan melalui online. Pastikan mengisi data dengan benar.
            </p>
            
            <!-- Tombol Daftar -->
            <a href="/formpasien/" class="btn btn-primary">Daftar</a>
            <a href="/caripasien/" class="btn btn-primary">Cari Pasien
            </a>
        </div>
    </div>
</div>

</div>

<div id="tentangKamiSection" class="container mt-4 text-center" style="background: linear-gradient(to left, #eef8ff, #ffffff); padding: 20px; box-sizing: border-box;">
    <!-- Konten Tentang Kami -->
<div class="container mt-4 text-center" style="background: linear-gradient(to left, #eef8ff, #ffffff); padding: 20px; box-sizing: border-box;">
        <h2 style="margin-bottom: 20px;">TENTANG KAMI</h2>

        <div class="d-flex justify-content-end">
            <!-- Gambar di sebelah kiri -->
            <div style="flex: 1; margin-right: 20px;">
                <img src="/img/tentang.png" alt="Gambar Tentang Kami" style="max-width: 100%; height: auto;">
            </div>
            <!-- Kata-kata di samping gambar -->
            <div style="flex: 1; text-align: left;">
                <h4 style="margin-top: 0;">SEJARAH KAMI</h4>
                <p>
                    Kami adalah rumah sakit yang berkomitmen untuk memberikan pelayanan kesehatan terbaik. Dengan tim dokter dan tenaga medis yang berpengalaman, kami siap memberikan perawatan yang optimal bagi setiap pasien.
                </p>
                
                <!-- Tombol Baca Selengkapnya -->
                <!-- <a href="#" class="btn btn-primary">Baca Selengkapnya</a> -->
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
    <!-- Tambahkan link ke jQuery Easing -->

@endsection
