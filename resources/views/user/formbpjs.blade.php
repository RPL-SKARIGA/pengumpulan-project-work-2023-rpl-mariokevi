@extends('layout.main')

@section('container') <!-- Ini sesuai dengan @yield('content') di layout.main -->
<div class="container">
    <div class="row">

        <h2 style="width: 100%; border-bottom: 4px solid green; margin-top: 20spx;"><b>FORM PENDAFTARAN BPJS</b></h2>
        <div class="col-8">
            <form>
                <br>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="poli" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="poli" name="poli">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="nik" class="col-sm-2 col-form-label">Nik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="no_bpjs" class="col-sm-2 col-form-label">No BPJS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_bpjs" name="no_bpjs">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Poli Klinik</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jk" name="jk">
                            <option selected>Pilih Poli</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="dokter" class="col-sm-2 col-form-label">Dokter</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="dokter" name="dokter">
                            <option selected>Pilih Dokter</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Pilih Gambar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto">
                            <label class="custom-file-label" for="foto">Choose file</label>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
@endsection