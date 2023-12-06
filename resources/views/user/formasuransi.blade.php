@extends('layout.main')
@section('container')
<div class="container">
    <div class="row">

        <h2 style="width: 100%; border-bottom: 4px solid green; margin-top: 20spx;"><b>FORM PENDAFTARAN BPJS</b></h2>
        <form>
            <br>
            <form action="/formpasien" method="post" enctype="multipart/form-data">
                        @csrf
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><b>nama</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date" class="col-sm-2 mb-4 col-form-label"><b>Tanggal Lahir</b></label>
                <div class="col-5">
                    <div class="input-group date" id="datepicker">
                        <input type="date" class="form-control" id="date" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 mb-4 col-form-label"><b>Tanggal Lahir</b></label>
                    <div class="col-5">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Option 1
                        <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="col-5">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Option 1
                        <label class="form-check-label" for="radio1"></label>
                    </div>
                </div>
            </div>
        </form>
        @endsection