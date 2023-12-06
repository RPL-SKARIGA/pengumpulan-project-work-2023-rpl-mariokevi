<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit</title>
    <!-- Tambahkan link CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan link Font Awesome di sini -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Custom styles for square photo container */
        .square-photo-container {
            position: relative;
            width: 150px; /* Sesuaikan lebar sesuai kebutuhan */
            height: 150px; /* Sesuaikan tinggi sesuai kebutuhan */
            overflow: hidden;
        }

        /* Custom styles for square photo */
        .square-photo {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        /* Gaya tambahan untuk mengurangi ukuran kartu */
        .card {
            width: 200px; /* Sesuaikan lebar sesuai kebutuhan */
            height: 180px; /* Sesuaikan tinggi sesuai kebutuhan */
            margin: 15px; /* Tambahkan margin untuk jarak antar kartu */
        }

        /* Gaya tambahan untuk mengurangi ukuran foto */
        .card-img-top {
            width: 100%; /* Foto mengikuti lebar kartu */
            height:100%; /* Sesuaikan tinggi sesuai kebutuhan */
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- Header section with phone number, Instagram, and Facebook icons -->
<div class="bg-light text-center py-2">
    <span><i class="fas fa-phone"></i> (+62) 433551</span>
    <span class="mx-2"><i class="fab fa-instagram"></i> <a href="https://www.instagram.com/" target="_blank">Instagram</a></span>
    <span><i class="fab fa-facebook"></i> <a href="https://www.facebook.com/" target="_blank">Facebook</a></span>
</div>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #D1F5FF;">
    <a class="navbar-brand ml-auto" href="#">Stesil Rumah Sakit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#home">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#daftarSection">DAFTAR</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tentangKamiSection">TENTANG KAMI</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Konten dari halaman Anda akan ditampilkan di sini -->
@yield('content')

<!-- Footer section -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12 text-white">
                <p class="mb-2" style="display: inline-block; margin-bottom: 10px;">Jl. Rumah Sakit No. 123, Kota Anda</p>
                <p class="mb-2" style="display: inline-block; margin-bottom: 10px;">Email: info@rumahsakit.com</p>
                <p style="display: inline-block; margin-bottom: 10px;">Telp: (+62) 433551</p>
            </div>
        </div>
    </div>
</footer>

<style>
    footer {
        padding: 30px 0;
    }

    .text-white {
        color: #fff;
    }

    /* Mengatur warna teks hyperlink di footer */
    footer a {
        color: #3498db;
    }

    /* Menghilangkan underlines dari hyperlink di footer */
    footer a:hover {
        text-decoration: none;
    }
</style>




<!-- Tambahkan script JS jQuery di sini -->
<!-- Ganti versi slim dengan versi lengkap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Tambahkan link ke jQuery Easing -->
<!-- Ganti versi jQuery Easing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Tambahkan script JS Bootstrap di sini -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Tambahkan skrip animasi scroll -->
<script>
    $(document).ready(function () {
        // Tambahkan efek scroll yang halus untuk semua tautan navbar
        $("a").on('click', function (event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, {
                    duration: 800,
                    easing: 'swing' // Gunakan easing dari jQuery (bawaan)
                }, function () {
                    window.location.hash = hash;
                });
            }
        });
    });
</script>

</body>
</html>
