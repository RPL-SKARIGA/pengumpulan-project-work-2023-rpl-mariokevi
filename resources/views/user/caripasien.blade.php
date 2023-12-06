<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Pasien</title>

    <!-- Memuat Bootstrap CSS versi 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Pencarian Dan Percetakan Antrean Pasien</h2>

        <!-- Form Pencarian -->
        <form action="/caripasien" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="Masukkan NIK yang telah terdaftar untuk mencari atau mencetak Nomer Antrean">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        @if(isset($data) && count($data) > 0)
        <!-- Card untuk Tabel -->
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No_Antrean</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nik</th>
                                        <th scope="col">penanggung</th>
                                        <th scope="col">poli</th>
                                        <th scope="col">dokter</th>
                                        <th scope="col">Tanggal_daftar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->antrean }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->penanggung }}</td>
                                        <td>{{ $row->poli->nama }}</td>
                                        <td>{{ $row->dokter->nama_dokter }}</td>
                                        <td>{{ $row->tanggal_daftar}}</td>
                                        <td>
                                            <!-- Ganti kelas fa fa-eye dengan kelas bi bi-eye -->
                                            <a href="#" id="show-detail" class="btn btn-info show-detail" data-toggle="modal" data-target="#modal-detail" data-nama="{{ $row->nama }}" data-antrean="{{ $row->antrean }}" data-nik="{{ $row->nik }}" data-penanggung="{{ $row->penanggung }}" data-poli="{{ $row->poli->nama }}" data-dokter="{{ $row->dokter->nama_dokter }}" data-tanggal="{{ $row->tanggal_daftar }}">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="/home/" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    
    <!-- Bagian Modal -->
    <div class="modal" id="modal-detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Antrean</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body table-responsive">
                    <div class="mb-3 row">
                        <label for="staticAntrean" class="col-sm-4 col-form-label">Nomer Antrean</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="nomer_antrean" name="nomer_antrean">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticNama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="nama_pasien" name="nama_pasien">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticTanggal" class="col-sm-4 col-form-label">Tanggal Daftar</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="tanggal_daftar" name="tanggal_daftar">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticPoli" class="col-sm-4 col-form-label">Poli</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="poli" name="poli">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticDokter" class="col-sm-4 col-form-label">Dokter</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="dokter" name="dokter">
                        </div>
                    </div>
                    <a href="/home/" class="btn btn-warning">Selesai</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Memuat jQuery terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Memuat Bootstrap JavaScript setelah jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Memuat SweetAlert2 untuk notifikasi -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Memuat Toastr untuk notifikasi -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#show-detail', function() { 
                var nama = $(this).data('nama');
                var antrean = $(this).data('antrean');
                var poli = $(this).data('poli');
                var dokter = $(this).data('dokter');
                var tanggal = $(this).data('tanggal');

                // Pastikan data yang diambil dari elemen form memiliki nilai yang benar
                $('#nama_pasien').val(nama);
                $('#nomer_antrean').val(antrean);
                $('#poli').val(poli);
                $('#dokter').val(dokter);
                $('#tanggal_daftar').val(tanggal);
                
                // Tampilkan modal
                $('#modal-detail').modal('show');
            });
        });
    </script>
</body>
</html>
