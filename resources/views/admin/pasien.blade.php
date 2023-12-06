@extends('admin.layout.admin')
<!-- Required meta tags -->
@push('css')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pasien</h1>
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
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-2">
            <a href="/formpasien" class="btn btn-success">Tambah Data</a>
        </div>
        <!-- <form class="d-flex flex-row mt-2 mb-3" action="/datapasien" method="get">
    <div class="input-group">
        <select class="form-control" id="poli "name="poli">
            <option value="">Pilih Poli</option>
            @foreach($polis as $poli)
                <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
            @endforeach
        </select>
        <select class="form-control" id="dokter" name="dokter">
            <option value="">Pilih Dokter</option>
            @foreach($dokters as $dokter)
                <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
            @endforeach
        </select>
        <input class="form-control form-control-navbar" type="date" placeholder="Tanggal Pendaftaran" name="tanggal_daftar">
        <div class="input-group-append">
            <button class="btn btn-light" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form> -->

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Pasien</th>
                        <th scope="col">No_Antrean</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nik</th>
                        <th scope="col">penanggung</th>
                        <th scope="col">Tanggal_daftar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->id_pasien }}</td>
                        <td>{{ $row->antrean }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <!-- <td>{{ $row->alamat }}</td>
                        <td>{{ $row->id_poli }}</td>
                        <td>{{ $row->id_dr }}</td> -->
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->penanggung }}</td>
                        <td>{{ $row->tanggal_daftar }}</td>
                        <!-- <td>{{ $row->no_penanggung }}</td>
                        <td>{{ $row->no_hp }}</td>
                        <td>{{ $row->foto }}</td> -->
                        <!-- <td>
                            <img src="{{ asset('fotodokter/' . $row->foto) }}" alt="" style="width: 40px;">
                        </td> -->
                        <td>
                            <a href="#" id="show-detail" class="btn btn-info show-detail" data-toggle="modal" data-target="#modal-detail" data-nama="{{ $row->nama }}" data-alamat="{{ $row->alamat }}" data-poli="{{ $row->Poli->nama }}" data-dokter="{{ $row->dokter->nama_dokter }}" data-no_hp="{{ $row->no_hp }}" data-no_penanggung="{{ $row->no_penanggung }}"  data-foto="{{ $row->foto }}">
                            <i class="fa fa-eye"></i> Detail
                            </a>
                            <a href="/tampilpasien/{{ $row->id_pasien }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id_pasien }}" data-nami="{{ $row->nama }}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($data as $row)
<div class="modal" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="row mb-3">
                    <label for="nama_dokter" class="col-sm-4 col-form-label">Nama Dokter:</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="nama_dokter" name="nama_dokter">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat:</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="alamat" name="alamat">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="poli" class="col-sm-4 col-form-label">Poli:</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="poli" name="poli">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_dr" class="col-sm-4 col-form-label">Dokter:</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="id_dr" name="id_dr">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="no_penanggung" class="col-sm-4 col-form-label">No Penanggung:</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="no_penanggung" name="no_penanggung">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="no_handphone" class="col-sm-4 col-form-label">No Handphone:</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="no_handphone" name="no_handphone">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="foto" class="col-sm-4 col-form-label">Foto KK:</label>
                    <div class="col-sm-8">
                        <img src="{{ asset('/fotopasien/' . $row->foto_kk) }}" alt="foto_kk " id="foto_kk" name="foto_kk" style="width: 100px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="foto" class="col-sm-4 col-form-label">Foto KTP:</label>
                    <div class="col-sm-8">
                        <img src="{{ asset('/fotopasien/' . $row->foto_ktp) }}" alt="foto_ktp " id="foto_ktp" name="foto_ktp" style="width: 100px;">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="foto" class="col-sm-4 col-form-label">Foto Kartu:</label>
                    <div class="col-sm-8">
                        <img src="{{ asset('/fotopasien/' . $row->foto_kartu) }}" alt="foto_kartu " id="foto_kartu" name="foto_kartu" style="width: 100px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@push('script')
<!-- /.content-header -->
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
    $(document).on('click', '#show-detail', function() { 
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var poli = $(this).data('poli');
        var dokter = $(this).data('dokter');
        var no_penanggung = $(this).data('no_penanggung');
        var no_hp = $(this).data('no_hp');
        var foto = $(this).data('foto');

        // Pastikan data yang diambil dari elemen form memiliki nilai yang benar
        $('#nama_dokter').val(dokter);
        $('#alamat').val(alamat);
        $('#poli').val(poli);
        $('#id_dr').val(dokter);
        $('#no_penanggung').val(no_penanggung);
        $('#no_handphone').val(no_hp);
        $('#foto').val(foto);
    });
});

</script>

<script>
    $('.delete').click(function() {
        var pasien = $(this).attr('data-id');
        var nama = $(this).attr('data-nami');
        swal({
                title: "yakin?",
                text: "Apakah mau menghapus data pasien dengan nama " + nama + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete_pasien/" + pasien + ""
                    swal("Data sudah berhasil terhapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>


@if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@endpush
