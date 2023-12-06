@extends('layout.main')

@section('container')
<link rel="stylesheet" href="/public/form.css">

<body>
    <style>
        .carousel-inner .item img {
            width: 700%;
            /* Atur lebar gambar sesuai kebutuhan */
            height: auto;
            /* Biarkan tinggi gambar mengikuti aspek rasio */
        }
    </style>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/img/slide1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/slide2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/slide3.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
    </div>
    <br>
    <h2 style="width: 100%; border-bottom: 4px solid green; margin-top: 80px;"><b>DAFTAR ONLINE</b></h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(16rem, 1fr)); gap: 20px;">
        <div class="card">
            <img class="card-img-top" src="/img/card1.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">BPJS KESEHATAN</h5>
                <p class="card-text">Untuk penanggung biaya dengan bpjs kesehatan</p>
                <a href="/formbpjs" class="btn btn-success">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="/img/card2.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Asuransi</h5>
                <p class="card-text">Untuk penanggung biaya dengan Asuransi Kesehatan</p>
                <a href="/formasuransi" class="btn btn-success">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="/img/card2.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Asuransi</h5>
                <p class="card-text">Untuk penanggung biaya dengan Asuransi Kesehatan</p>
                <a href="/formasuransi" class="btn btn-success">Go somewhere</a>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi carousel
            $('#carouselExampleControls').carousel();
        });
    </script>
</body>

@endsection