<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Pasien</title>

    <!-- Bootstrap CSS -->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            today.setDate(today.getDate() + 1); // Tambahkan satu hari dari hari ini
            var minDate = today.toISOString().split('T')[0];
            
            document.getElementById('tanggal_daftar').setAttribute('min', minDate);
        });
    </script>
    
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-center">Form Pendaftaran Pasien Rumah Sakit</h2>

        <form action="/proses_daftar" method="post" enctype="multipart/form-data" id="formDaftar">
            @csrf
            <div class="row justify-content-between">
                <div class="col-12 col-md-6">
                <div class="alert alert-dark" role="alert">
                    Data Pasien
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pasien:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                        <small id="nikError" class="text-danger"></small>
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
                        <label for="tanggal_daftar" class="form-label">Tanggal Daftar:</label>
                        <input type="date" class="form-control" id="tanggal_daftar" name="tanggal_daftar" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_poli" class="form-label">Poli:</label>
                        <select class="form-select" id="id_poli" name="id_poli" required>
                            <option value="">Pilih Poli</option>
                            @foreach ($po as $poli)
                                <option value="{{ $poli->id_poli }}">{{ $poli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_dr" class="form-label">Dokter:</label>
                        <div class="input-group">
                            <select class="form-select" id="id_dr" name="id_dr" required></select>
                            <!-- Tambahkan tombol "Jadwal" di samping input "Pilih Dokter" -->
                            <button type="button" class="btn btn-warning" id="jadwalButton">Jadwal</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="penanggung" class="form-label">Penanggung:</label>
                        <select class="form-select" id="penanggung" name="penanggung" required>
                        <option value="">Pilih Penanggung</option>
                            <option value="UMUM">UMUM</option>
                            <option value="BPJS">BPJS TENAGA KESEHATAN</option>
                            <option value="ASURANSI">Asuransi</option>
                        </select>
                    </div>

                    <div class="mb-3" id="noPenanggungContainer">
                        <label for="no_penanggung" class="form-label">No Penanggung:</label>
                        <input type="text" class="form-control" id="no_penanggung" name="no_penanggung" required>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                <div class="alert alert-dark" role="alert">
                    Data Pasien
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Telepon:</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="5" style="resize: none;" required></textarea>
                    </div>
                    
                    <div class="alert alert-dark" role="alert">
                    Data Pendaftaran
                    </div>
                    
                    <div class="mb-3">
                        <label for="foto_kk" class="form-label">Foto (Kartu Keluarga) *Wajib</label>
                        <input type="file" name="foto_kk" class="form-control" id="foto_kk">
                    </div>

                    <div class="mb-3">
                        <label for="foto_ktp" class="form-label">Foto KTP (Kartu Tanda Penduduk)</label>
                        <input type="file" name="foto_ktp" class="form-control" id="foto_ktp">
                    </div>

                    <div class="mb-3" id="kartuContainer">
                        <label for="foto_kartu" class="form-label">Foto Kartu(BPJS/Asuransi) *Bagi yang menggunakan bpjs atau asuransi</label>
                        <input type="file" name="foto_kartu" class="form-control" id="foto_kartu">
                    </div>

            </div>
</div>
             
<div class="d-grid">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
        </form>
    </div>
</div>
<div class="modal" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Jadwal Dokter</h4>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Senin</th>
                            <td><span id="senin_awal"></span></td>
                            <td><span id="senin_akhir"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Selasa</th>
                            <td><span id="selasa_awal"></span></td>
                            <td><span id="selasa_akhir"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Rabu</th>
                            <td><span id="rabu_awal"></span></td>
                            <td><span id="rabu_akhir"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Kamis</th>
                            <td><span id="kamis_awal"></span></td>
                            <td><span id="kamis_akhir"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Jumat</th>
                            <td><span id="jumat_awal"></span></td>
                            <td><span id="jumat_akhir"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Sabtu</th>
                            <td><span id="sabtu_awal"></span></td>
                            <td><span id="sabtu_akhir"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Minggu</th>
                            <td><span id="minggu_awal"></span></td>
                            <td><span id="minggu_akhir"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Tempatkan script ini di akhir bagian <body> sebelum tag </body> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function () {
        // Menangani tindakan klik pada tombol "Jadwal"
        $('#jadwalButton').on('click', function () {
            // Mengambil nilai dokter yang dipilih dari dropdown
            var selectedDoctorId = $('#id_dr').val();

            // Memastikan dokter telah dipilih
            if (selectedDoctorId) {
                // Panggil fungsi untuk mendapatkan jadwal dokter
                getDoctorSchedule(selectedDoctorId);
            } else {
                // Tampilkan pesan jika dokter belum dipilih
                Swal.fire({
                    title: 'Pilih Dokter',
                    icon: 'info',
                    text: 'Silakan pilih dokter terlebih dahulu.',
                });
            }
        });

        // Fungsi untuk mendapatkan jadwal dokter
        function getDoctorSchedule(doctorId) {
            // Lakukan permintaan AJAX ke server
            $.ajax({
                url: '/get_doctor_schedule/' + doctorId,
                type: 'GET',
                success: function (response) {
                    // Menampilkan modal dengan jadwal dokter
                    showDoctorSchedule(response);
                },
                error: function (error) {
                    console.log('Error in AJAX request:', error);
                }
            });
        }
        function showDoctorSchedule(schedule) {
            // Isi nilai jadwal pada elemen-elemen modal
            $('#nama_dokter').val(schedule.nama_dokter);
            $('#senin_awal').text(schedule.senin_awal);
            $('#senin_akhir').text(schedule.senin_akhir);
            $('#selasa_awal').text(schedule.selasa_awal);
            $('#selasa_akhir').text(schedule.selasa_akhir);
            $('#rabu_awal').text(schedule.rabu_awal);
            $('#rabu_akhir').text(schedule.rabu_akhir);
            $('#kamis_awal').text(schedule.kamis_awal);
            $('#kamis_akhir').text(schedule.kamis_akhir);
            $('#jumat_awal').text(schedule.jumat_awal);
            $('#jumat_akhir').text(schedule.jumat_akhir);
            $('#sabtu_awal').text(schedule.sabtu_awal);
            $('#sabtu_akhir').text(schedule.sabtu_akhir);
            $('#minggu_awal').text(schedule.minggu_awal);
            $('#minggu_akhir').text(schedule.minggu_akhir);

            // Tampilkan modal
            $('#modal-detail').modal('show');
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#nik').on('blur', function () {
            var nik = $(this).val();

            // Melakukan validasi NIK
            if (nik.length > 16 || isNaN(nik)) {
                $('#nikError').text(' NIK tidak valid / NIK Sudah terdaftar.');
                $('#nik').addClass('is-invalid');
            } else {
                // Panggil fungsi untuk memeriksa apakah NIK sudah terdaftar
                checkNikAvailability(nik);
            }
        });

        function checkNikAvailability(nik) {
    // Lakukan permintaan AJAX ke server
    $.ajax({
        url: '/check_nik_availability', // Ganti dengan URL endpoint yang sesuai di server
        type: 'POST',
        data: { nik: nik },
        success: function (response) {
            console.log('Response from server:', response);

            if (response.available) {
                // NIK belum terdaftar, hapus pesan validasi
                $('#nikError').text('');
                $('#nik').removeClass('is-invalid');
            } else {
                // NIK sudah terdaftar, tampilkan pesan validasi
                $('#nikError').text('NIK sudah terdaftar.');
                $('#nik').addClass('is-invalid');
            }
        },
        error: function (error) {
            console.log('Error in AJAX request:', error);
        }
    });
}

    });
</script>



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
                $('#foto_kartu').prop('required', true);
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
<script>
    $(document).ready(function () {
    $('#formDaftar').submit(function (e) {
        e.preventDefault();

        // Mengumpulkan data formulir
        var formData = new FormData(this);

        // Mengirim data ke server menggunakan AJAX
        $.ajax({
            url: '/proses_daftar',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Menampilkan SweetAlert dengan informasi antrean, nama, poli, dokter, dan nomor antrean
                Swal.fire({
                    title: 'Pendaftaran Berhasil',
                    icon: 'success',
                    html:
                                'Antrean: ' + response.antrean +
                                '<br>Nama: ' + response.nama +
                                '<br>Tanggal Daftar: ' + response.tanggalDaftar +
                                '<br>Poli: ' + response.poli +
                                '<br>Dokter: ' + response.dokter +
                                '<br>Nomor Antrean: ' + response.antrean,
                            footer: 'Nomor Antrean: ' + response.antrean,
                }).then((result) => {
                    // Setelah pengguna mengklik "OK", pindahkan ke halaman home
                    if (result.isConfirmed) {
                        window.location.href = '/caripasien'; // Ganti '/home' dengan URL halaman home yang sesuai
                    }
                });

                // Reset formulir setelah berhasil mendaftar
                $('#formDaftar')[0].reset();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});

</script>


</body>
</html>
