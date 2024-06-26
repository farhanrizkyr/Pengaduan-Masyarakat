@extends('Components_User.Layout_User')
@section('title','Buat Pengaduan masyarakat')
@section('main')

<div class="pagetitle">
    <h1>Halaman  Buat Pengaduan Masyarakat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/apps-user/dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item">Halaman Buat Pengaduan Masyarakat</li>
      </ol>
    </nav>
  </div>


  <div class="card" style="padding:22px; ">
   <form action="/apps-user/proses-pengajuan-masyarakat" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grup">
        <label for="">Judul Pengaduan</label>
        <input type="text" class="form-control" name="judul">
        @error('judul')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="grup">
        <label for="">Gambar</label>
        <input type="file" class="form-control" name="gambar">
        @error('gambar')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="grup">
        <label for="">Pengaduan</label>
       <textarea name="pengaduan"  class="tinymce-editor"></textarea>
        @error('pengaduan')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <button class="btn btn-primary mt-3"><i class="bi bi-floppy"></i> Buat Pengaduan</button>
</form>
  </div>


  @endsection