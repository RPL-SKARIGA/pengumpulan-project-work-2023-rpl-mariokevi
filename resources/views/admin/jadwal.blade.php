@extends('admin.layout.admin')
@push('css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
@endpush

@section('content')
<h1 class="text-center"></h1>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Jadwal Dokter v2</h1>
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
            <div class="card">
                <div class="card-body">
                    <form action="/tambahjadwal" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Dokter</label>
                            <select class="form-select @error('id_dr') is-invalid @enderror" name="id_dr" aria-label="Default select example">
                                <option value="" selected>Pilih Dokter</option>
                                @foreach ($datadokter as $dokter)
                                    @php
                                        // Cek apakah dokter ini sudah memiliki jadwal
                                        $hasJadwal = App\Models\Jadwal_baru::where('id_dr', $dokter->id_dokter)->exists();
                                        // Tambahkan logging
                                        Log::info('Dokter ID: ' . $dokter->id_dokter . ', Nama: ' . $dokter->nama_dokter . ', Has Jadwal: ' . ($hasJadwal ? 'Yes' : 'No'));
                                    @endphp
                                    @if (!$hasJadwal)
                                        <option value="{{ $dokter->id_dokter }}">{{ $dokter->nama_dokter }}</option>
                                    @endif
                                @endforeach

                                @error('id_dr')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>

                        <!-- senin -->
                        <div class="mb-3">
                            <label for="seninJamAwal">Senin Jam Awal:</label>
                            <label class="form-label" for="seninJamAkhir" style="margin-left: 8rem;">Senin Jam Akhir:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="senin_awal" name="senin_awal" class="form-control" placeholder="08:00">
                                </div>
                                <div class="col">
                                    <input type="text" id="senin_akhir" name="senin_akhir" class="form-control" placeholder="16:00">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="selasaJamAwal">Selasa Jam Awal:</label>
                            <label class="form-label" for="selasaJamAkhir" style="margin-left: 8rem;">Selasa Jam Akhir:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="selasa_awal" name="selasa_awal" class="form-control" placeholder="08:00">
                                </div>
                                <div class="col">
                                    <input type="text" id="selasa_akhir" name="selasa_akhir" class="form-control" placeholder="16:00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="rabuJamAwal">Rabu Jam Awal:</label>
                            <label class="form-label" for="rabuJamAkhir" style="margin-left: 8rem;">Rabu Jam Akhir:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="rabu_awal" name="rabu_awal" class="form-control" placeholder="08:00">
                                </div>
                                <div class="col">
                                    <input type="text" id="rabu_akhir" name="rabu_akhir" class="form-control" placeholder="16:00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kamisJamAwal">Kamis Jam Awal:</label>
                            <label class="form-label" for="kamisJamAkhir" style="margin-left: 8rem;">Kamis Jam Akhir:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="kamis_awal" name="kamis_awal" class="form-control" placeholder="08:00">
                                </div>
                                <div class="col">
                                    <input type="text" id="kamis_akhir" name="kamis_akhir" class="form-control" placeholder="16:00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumatJamAwal">Jumat Jam Awal:</label>
                            <label class="form-label" for="jumatJamAkhir" style="margin-left: 8rem;">Jumat Jam Akhir:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="jumat_awal" name="jumat_awal" class="form-control" placeholder="08:00">
                                </div>
                                <div class="col">
                                    <input type="text" id="jumat_akhir" name="jumat_akhir" class="form-control" placeholder="16:00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sabtuJamAwal">Sabtu Jam Awal:</label>
                            <label class="form-label" for="sabtuJamAkhir" style="margin-left: 8rem;">Sabtu Jam Akhir:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="sabtu_awal" name="sabtu_awal" class="form-control" placeholder="08:00">
                                </div>
                                <div class="col">
                                    <input type="text" id="sabtu_akhir" name="sabtu_akhir" class="form-control" placeholder="16:00">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mingguJamAwal">Minggu Jam Awal:</label>
                            <label class="form-label" for="mingguJamAkhir" style="margin-left: 8rem;">Minggu Jam Akhir:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="minggu_awal" name="minggu_awal" class="form-control" placeholder="08:00">
                                </div>
                                <div class="col">
                                    <input type="text" id="minggu_akhir" name="minggu_akhir" class="form-control" placeholder="16:00">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#senin_awal, #senin_akhir, #selasa_awal, #selasa_akhir, #rabu_awal ,#rabu_akhir, #kamis_awal ,#kamis_akhir, #jumat_awal ,#jumat_akhir, #sabtu_awal ,#sabtu_akhir, #minggu_awal ,#minggu_akhir').timepicker({
                showMeridian: false,
                minuteStep: 15,
                defaultTime: '08:00',
            });
        });
    </script>
@endpush