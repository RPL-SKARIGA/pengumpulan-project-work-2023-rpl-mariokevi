@extends('admin.layout.admin')
@push('css')
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous"> -->
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
    <div class="card p-3 " style="width: 500px; border-radius: 15px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);">
            <div class="cardbody">
                <form action="/datajadwal" method="get" enctype="multipart/form-data">
                    @csrf
                        <a href="/jadwal" class="btn btn-warning">Jadwal</a>
                        <br>
                        <br>
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
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Dokter</label>
                        <div class="col-sm-8">
                            @if($datadokter->count() > 0)
                                @foreach($datadokter as $jadwal)
                                    <input type="text" readonly class="form-control-plaintext" id="nama_dokter" value="{{ $jadwal->dokter->nama_dokter }}">
                                @endforeach
                            @else
                                <input type="text" readonly class="form-control-plaintext" id="nama_dokter" value="Tidak ada hasil ditemukan">
                            @endif
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam_Awal</th>
                                <th scope="col">Jam_Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($datadokter as $row)
                            <tr>
                                <th scope="row">Senin</th>
                                <td>{{ $row->senin_awal }}</td>
                                <td>{{ $row->senin_akhir }}</td>
                                <!-- <td>
                                    <a href="/tampilkandata/{{ $row->id_dokter }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_dokter }}" data-nama="{{ $row->nama_dokter }}">Hapus</a>
                                </td> -->
                            </tr>
                            <tr>
                                <th scope="row">Selasa</th>
                                <td>{{ $row->selasa_awal }}</td>
                                <td>{{ $row->selasa_akhir }}</td>
                                <!-- <td>
                                    <a href="/tampilkandata/{{ $row->id_dokter }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_dokter }}" data-nama="{{ $row->nama_dokter }}">Hapus</a>
                                </td> -->
                            </tr>
                            <tr>
                                <th scope="row">Rabu</th>
                                <td>{{ $row->rabu_awal }}</td>
                                <td>{{ $row->rabu_akhir }}</td>
                                <!-- <td>
                                    <a href="/tampilkandata/{{ $row->id_dokter }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_dokter }}" data-nama="{{ $row->nama_dokter }}">Hapus</a>
                                </td> -->
                            </tr>
                            <tr>
                                <th scope="row">Kamis</th>
                                <td>{{ $row->kamis_awal }}</td>
                                <td>{{ $row->kamis_akhir }}</td>
                                <!-- <td>
                                    <a href="/tampilkandata/{{ $row->id_dokter }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_dokter }}" data-nama="{{ $row->nama_dokter }}">Hapus</a>
                                </td> -->
                            </tr>
                            <tr>
                                <th scope="row">Jumat</th>
                                <td>{{ $row->jumat_awal }}</td>
                                <td>{{ $row->jumat_akhir }}</td>
                                <!-- <td>
                                    <a href="/tampilkandata/{{ $row->id_dokter }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_dokter }}" data-nama="{{ $row->nama_dokter }}">Hapus</a>
                                </td> -->
                            </tr>
                            <tr>
                                <th scope="row">Sabtu</th>
                                <td>{{ $row->sabtu_awal }}</td>
                                <td>{{ $row->sabtu_akhir }}</td>
                                <!-- <td>
                                    <a href="/tampilkandata/{{ $row->id_dokter }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_dokter }}" data-nama="{{ $row->nama_dokter }}">Hapus</a>
                                </td> -->
                            </tr>
                            <tr>
                                <th scope="row">Minggu</th>
                                <td>{{ $row->minggu_awal }}</td>
                                <td>{{ $row->minggu_akhir }}</td>
                                <!-- <td>
                                    <a href="/tampilkandata/{{ $row->id_dokter }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_dokter }}" data-nama="{{ $row->nama_dokter }}">Hapus</a>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @foreach($datadokter as $del)
                    <a href="/tampildata/{{ $del->id_jadwal }}" class="btn btn-info">Edit</a>
                    <a href="#" class="btn btn-danger delete" data-id="{{ $del->id_jadwal }}" data-nama="{{  $del->dokter->nama_dokter }}">Hapus</a>
                    @endforeach

            </div>
        </div>
</div>
        </form>
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
    $('.delete').click(function() {
        var dokterid = $(this).attr('data-id');

        var nama = $(this).attr('data-nama');
        swal({
                title: "yakin?",
                text: "Apakah mau menghapus data dokter dengan nama " + nama + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletejadwal/" + dokterid + ""
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