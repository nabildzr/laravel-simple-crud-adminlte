<?php
use App\Models\Kelas;

?>

@extends('templates/header')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">{{ empty(@$result) ? 'Tambah' : 'Edit' }} Data Siswa</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <h3 class="mb-0">{{ empty(@$result) ? 'Tambah' : 'Edit' }} Data Siswa</h3>
                            </li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            @include('templates/feedback')

            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row g-4">

                    <!--begin::Col-->
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <a href="{{ url('siswa') }}" class="btn btn-dark">
                                <i class="fa fa-chevron-left"></i> Kembali
                            </a>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action={{ empty($result) ? uri('add') : url("siswa/$result->nis/edit") }} method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            @if (!empty($result))
                                {{ method_field('patch') }}
                            @endif
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="NIS" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        placeholder="Masukkan NIS" value="{{ @$result->nis }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Masukkan Nama Lengkap" value="{{ @$result->nama_lengkap }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <div class="checkbox">
                                        <label for="">
                                            <input type="radio" name="jenis_kelamin" value="L"
                                                {{ @$result->jenis_kelamin == 'L' ? 'checked' : '' }}> L
                                        </label>
                                        <label for="">
                                            <input type="radio" name="jenis_kelamin" value="P"
                                                {{ @$result->jenis_kelamin == 'P' ? 'checked' : '' }}> P
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukkan Alamat" value="{{ @$result->alamat }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telp</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                        placeholder="Masukkan Nomor Telp" value="{{ @$result->no_telp }}" />
                                </div>
                                <div class="mb-3">
                                    <select name="id_kelas" class="form-control">
                                        @foreach (Kelas::all() as $kelas)
                                            <option value="{{ $kelas->id_kelas }}"
                                                {{ @$result->id_kelas == $kelas->id_kelas ? 'selected' : '' }}>
                                                {{ $kelas->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" />

                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Quick Example-->

                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection
