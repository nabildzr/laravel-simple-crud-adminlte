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
                         <h3 class="mb-0">{{ empty($result) ? 'Tambah' : 'Edit' }} Data Kelas</h3>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-end">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page">
                                 <h3 class="mb-0">{{ empty($result) ? 'Tambah' : 'Edit' }} Data Kelas</h3>
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
                             <a href="{{ url('/') }}" class="btn btn-dark">
                                 <i class="fa fa-chevron-left"></i> Kembali
                             </a>
                         </div>
                         <!--end::Header-->
                         <!--begin::Form-->
                         <form action={{ empty($result) ? uri('add') : url("kelas/$result->id_kelas/edit") }}
                             method="POST">
                             @csrf


                             @if (!empty($result))
                                 {{ method_field('patch') }}
                             @endif
                             <!--begin::Body-->
                             <div class="card-body">
                                 <div class="mb-3">
                                     <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                     <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                                         placeholder="Masukkan Nama Kelas" value="{{ @$result->nama_kelas }}" />
                                 </div>
                                 <div class="mb-3">
                                     <label for="jurusan" class="form-label">Jurusan</label>
                                     <input type="text" class="form-control" id="jurusan" name="jurusan"
                                         placeholder="Masukkan Jurusan" value="{{ @$result->jurusan }}" />
                                 </div>
                             </div>
                             <!--end::Body-->
                             <!--begin::Footer-->
                             <div class="card-footer">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                     Submit</button>
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
