@extends('admin.layout.admin')

@push('css')
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal dokter v2</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3 border-radius-15 box-shadow-10">
                    <div class="card-body">
                        <form action="/jadwal_dr" method="get" enctype="multipart/form-data">
                            @csrf
                            <a href="/jadwal" class="btn btn-warning mb-2">Jadwal</a>
                            <div class="mb-3 row">
                                <div class="input-group">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Cari" aria-label="Cari" name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-light" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Poli</th>
                                    <th scope="col">Dibuat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($datadokter as $row)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>
                                        @if($row->dokter)
                                        {{ $row->dokter->nama_dokter }}
                                        @else
                                        Tidak ada data dokter
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->dokter)
                                        {{ $row->dokter->Poli->nama }}
                                        @else
                                        Tidak ada data dokter
                                        @endif
                                    </td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                        <a href="#" id="show-detail" class="btn btn-info show-detail" data-toggle="modal" data-target="#modal-detail" data-nama="{{ $row->dokter->nama_dokter }}" data-senin_awal="{{ $row->senin_awal }}" data-senin_akhir="{{ $row->senin_akhir }}" data-selasa_awal="{{ $row->selasa_awal }}" data-selasa_akhir="{{ $row->selasa_akhir }}" data-rabu_awal="{{ $row->rabu_awal }}" data-rabu_akhir="{{ $row->rabu_akhir }}" data-kamis_awal="{{ $row->kamis_awal }}" data-kamis_akhir="{{ $row->kamis_akhir }}" data-jumat_awal="{{ $row->jumat_awal }}" data-jumat_akhir="{{ $row->jumat_akhir }}" data-sabtu_awal="{{ $row->sabtu_awal }}" data-sabtu_akhir="{{ $row->sabtu_akhir }}" data-minggu_awal="{{ $row->minggu_awal }}" data-minggu_akhir="{{ $row->minggu_akhir }}" data-id-jadwal="{{ $row->id_jadwal }}">
                                            <i class="fa fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Dokter</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="nama_dokter" name="nama_dokter">
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam_Awal</th>
                            <th scope="col">Jam_Akhir</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Senin</th>
                            <td><span id="senin_awal"></span></td>
                            <td><span id="senin_akhir"></span></td>
                            <td> <button class="btn btn-warning set-libur">Libur</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Selasa</th>
                            <td><span id="selasa_awal"></span></td>
                            <td><span id="selasa_akhir"></span></td>
                            <td> <button class="btn btn-warning set-libur">Libur</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Rabu</th>
                            <td><span id="rabu_awal"></span></td>
                            <td><span id="rabu_akhir"></span></td>
                            <td> <button class="btn btn-warning set-libur">Libur</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Kamis</th>
                            <td><span id="kamis_awal"></span></td>
                            <td><span id="kamis_akhir"></span></td>
                            <td> <button class="btn btn-warning set-libur">Libur</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Jumat</th>
                            <td><span id="jumat_awal"></span></td>
                            <td><span id="jumat_akhir"></span></td>
                            <td> <button class="btn btn-warning set-libur">Libur</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Sabtu</th>
                            <td><span id="sabtu_awal"></span></td>
                            <td><span id="sabtu_akhir"></span></td>
                            <td> <button class="btn btn-warning set-libur">Libur</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Minggu</th>
                            <td><span id="minggu_awal"></span></td>
                            <td><span id="minggu_akhir"></span></td>
                            <td> <button class="btn btn-warning set-libur">Libur</button></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn-info edit-link">Edit</a>
                <a href="#" class="btn btn-danger delete" data-id-jadwal="{{ $row->id_jadwal }}" data-nama="{{ $row->dokter->nama_dokter }}">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endsection

    @push('script')
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
$(document).on('click', '#show-detail', function() { 
    var nama = $(this).data('nama');
    var senin_awal = $(this).data('senin_awal');
    var senin_akhir = $(this).data('senin_akhir');
    var selasa_awal = $(this).data('selasa_awal');
    var selasa_akhir = $(this).data('senin_akhir');
    var rabu_awal = $(this).data('rabu_awal');
    var rabu_akhir = $(this).data('rabu_akhir');
    var kamis_awal = $(this).data('kamis_awal');
    var kamis_akhir = $(this).data('kamis_akhir');
    var jumat_awal = $(this).data('jumat_awal');
    var jumat_akhir = $(this).data('jumat_akhir');
    var sabtu_awal = $(this).data('sabtu_awal');
    var sabtu_akhir = $(this).data('sabtu_akhir');
    var minggu_awal = $(this).data('minggu_awal');
    var minggu_akhir = $(this).data('minggu_akhir');

    $('#nama_dokter').val(nama);
    $('#senin_awal').text(senin_awal);
    $('#senin_akhir').text(senin_akhir);
    $('#selasa_awal').text(selasa_awal);
    $('#selasa_akhir').text(selasa_akhir);
    $('#rabu_awal').text(rabu_awal);
    $('#rabu_akhir').text(rabu_akhir);
    $('#kamis_awal').text(kamis_awal);
    $('#kamis_akhir').text(kamis_akhir);
    $('#jumat_awal').text(jumat_awal);
    $('#jumat_akhir').text(jumat_akhir);
    $('#sabtu_awal').text(sabtu_awal);
    $('#sabtu_akhir').text(sabtu_akhir);
    $('#minggu_awal').text(minggu_awal);
    $('#minggu_akhir').text(minggu_akhir);
})
})
</script>

<script>
    $(document).on("click", ".show-detail", function () {
        var idJadwal = $(this).data("id-jadwal");
        // Sekarang, Anda dapat menggunakan variabel idJadwal untuk tautan pengeditan atau logika lainnya
        // Contoh:
        var editLink = "/tampildata/" + idJadwal;
        $(".btn-info.edit-link").attr("href", editLink);
    });
</script>
<script>
    $(document).on('click', '.set-libur', function() {
        // Ambil baris yang sesuai dengan tombol yang ditekan
        var row = $(this).closest('tr');

        // Set jam awal dan jam akhir menjadi "Libur"
        row.find('#senin_awal').text('Libur');
        row.find('#senin_akhir').text('Libur');
        row.find('#selasa_awal').text('Libur');
        row.find('#selasa_akhir').text('Libur');
        // Set baris serupa untuk setiap hari

        // Tambahan: Tambahkan logika untuk menyimpan perubahan ke server jika diperlukan
    });
</script>
<script>
   $('.delete').click(function () {
    var dokterid = $(this).data('id-jadwal'); // Menggunakan data-id-jadwal

    var nama = $(this).data('nama');
    swal({
        title: "Yakin?",
        text: "Apakah Anda yakin ingin menghapus data dokter dengan nama " + nama + "?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/deletejadwal/" + dokterid;
                swal("Data sudah berhasil terhapus", {
                    icon: "success",
                });
            } else {
                swal("Data tidak jadi dihapus");
            }
        });
});

</script>
<!-- <script>
    toastr.success('havebjdsbhjsbd', 'miueudjsb');
</script> -->

@if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@endpush