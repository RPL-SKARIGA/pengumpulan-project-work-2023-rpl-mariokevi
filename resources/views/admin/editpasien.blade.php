@extends('admin.layout.admin')
@push('css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')
<h1 class="text-center"></h1>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard v2</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                                       <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-center">Form Pendaftaran Pasien Rumah Sakit</h2>
        <form action="/updatepasien/{{$data->id_pasien}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-between">
                <div class="col-12 col-md-6">
                <div class="alert alert-dark" role="alert">
                    Data Pasien
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pasien:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $data-> nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $data-> tanggal_lahir }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $data-> nik }}"required>
                    </div>
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="mb-12"> <!-- Tambahkan class mb-4 untuk margin bottom -->
                        <div class="alert alert-dark" role="alert">
                            Data Pendaftaran
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="id_poli" class="form-label">Poli:</label>
                        <select class="form-select" id="id_poli" name="id_poli" required>
                            <option value="{{ $data->Poli->id_poli }}">{{ $data->Poli->nama }}</option>
                            @foreach ($po as $poli)
                                <option value="{{ $poli->id_poli }}">{{ $poli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_dr" class="form-label">Dokter:</label>
                        <div class="input-group">
                            <select class="form-select" id="id_dr" name="id_dr" required>
                            <option value="{{ $data->dokter->id_dokter }}">{{ $data->dokter->nama_dokter}}</option>
                            <!-- Tambahkan tombol "Jadwal" di samping input "Pilih Dokter" -->
</select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="penanggung" class="form-label">Penanggung:</label>
                        <select class="form-select" id="penanggung" name="penanggung" required>
                        <option value="{{ $data->penanggung }}">{{ $data->penanggung }}</option>
                            <option value="UMUM">UMUM</option>
                            <option value="BPJS">BPJS TENAGA KESEHATAN</option>
                            <option value="ASURANSI">Asuransi</option>
                        </select>
                    </div>

                    <div class="mb-3" id="noPenanggungContainer">
                        <label for="no_penanggung" class="form-label">No Penanggung:</label>
                        <input type="text" class="form-control" id="no_penanggung" name="no_penanggung" value="{{ $data-> no_penanggung }}" >
                    </div>
                </div>

                <div class="col-12 col-md-6">
                <div class="alert alert-dark" role="alert">
                    Data Pasien
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="{{ $data->jenis_kelamin }}">{{ $data->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Telepon:</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $data-> no_hp }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" value="{{ $data-> alamat }}"  rows="5" style="resize: none;"required></textarea>
                    </div>
                    
                    <div class="alert alert-dark" role="alert">
                    Data Pendaftaran
                    </div>
                    
                    <div class="mb-3">
                        <label for="foto_kk" class="form-label">Foto (Kartu Keluarga) *Wajib</label>
                        <input type="file" name="foto_kk" class="form-control" id="foto_kk" value="{{ $data-> foto_kk }}" >
                    </div>

                    <div class="mb-3">
                        <label for="foto_ktp" class="form-label">Foto KTP (Kartu Tanda Penduduk)</label>
                        <input type="file" name="foto_ktp" class="form-control" id="foto_ktp" value="{{ $data-> foto_ktp }}">
                    </div>

                    <div class="mb-3" id="kartuContainer">
                        <label for="foto_kartu" class="form-label">Foto Kartu(BPJS/Asuransi) *Bagi yang menggunakan bpjs atau asuransi</label>
                        <input type="file" name="foto_kartu" class="form-control" id="foto_kartu" value="{{ $data-> foto_kartu }}">
                    </div>

            </div>
</div>
                <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </div>
</div>
    </div>

    @push('script')
<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Tempatkan script ini di akhir bagian <body> sebelum tag </body> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#id_poli').on('change', function () {
            var poli = $(this).val();

            if (poli) {
                $.ajax({
                    url: '/formpasien/dokter/' + poli,
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'poli': poli
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        $('#id_dr').empty().append("<option value=''>--Pilih--</option>");

                        if (data && data.length > 0) {
                            $.each(data, function (key, dokter) {
                                $('#id_dr').append(
                                    '<option value="' + dokter.id_dokter + '">' + dokter.nama_dokter + '</option>'
                                );
                            });
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Awalnya sembunyikan container No Penanggung
        $('#noPenanggungContainer').hide();
        $('#kartuContainer').hide();

        // Tangani peristiwa perubahan pada dropdown Penanggung
        $('#penanggung').on('change', function () {
            var selectedPenanggung = $(this).val();

            // Jika Penanggung adalah BPjs atau Asuransi, tampilkan container No Penanggung, jika tidak, sembunyikan
            if (selectedPenanggung === 'BPJS' || selectedPenanggung === 'ASURANSI') {
                $('#kartuContainer').show();
                $('#noPenanggungContainer').show();

                // Tambahkan atribut required untuk input No Penanggung
                $('#no_penanggung').prop('required', true);
                $('#kartuContainer').prop('required', true);
            } else {
                // Jika Penanggung adalah Umum, sembunyikan container No Penanggung, hapus atribut required, dan hapus nilai inputnya
                $('#noPenanggungContainer').hide();
                $('#kartuContainer').hide();
                $('#no_penanggung').prop('required', false).val('');
                $('#kartuContainer').prop('required', false).val('');
            }
        });
    });
</script>
@endpush
