@extends('Components_User.Layout_User')
@section('title','List Pengaduan masyarakat')
@section('main')

<div class="pagetitle">
    <h1>Halaman Pengaduan Masyarakat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/apps-user/dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item">Halaman List Pengaduan Masyarakat</li>
      </ol>
    </nav>
  </div>
   @if (Session::get('pesan'))
   <div class="alert alert-success  alert-dismissible fade show" role="alert">
    <strong>Berhasil !</strong> {{Session::get('pesan')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> 
   @endif

<a href="/apps-user/buat-laporan-pengaduan/" class="btn btn-primary mb-3"><i class="bi bi-floppy"></i>
 Buat Laporan Pengaduan
</a>
<div class="card table-rsponsive">
    <table class="table datatable">
       <thead>
        <tr>
            <th>No</th>
            <th>Judul Pengaduan</th>
            <th>Gambar</th>
            <th>Pengaduan</th>
            <th>Catatan Petugas</th>
            <th>Petugas</th>
            <th>Aksi</th>
        </tr>
       </thead>

       <tbody>
        @foreach ($pengaduans as $pngaduan)
        <tr>
          <th></th>
        </tr>
        @endforeach
       </tbody>


    </table>


</div>
    
@endsection
