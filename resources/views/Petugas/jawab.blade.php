@extends('Components_Petugas.Layout_Petugas')
@section('title','Jawab Pengaduan')
@section('main')

<div class="card" style="padding:22px">
    <h5>Jawab Pengaduan Mayarakat</h5>
    <form action="/apps-petugas/proses-jawab-pengaduan/{{$data->id}}" method="post">
        @csrf
        <div class="grup">
            <label for="">Judul</label>
           <input type="text" class="form-control" readonly value=" {{$data->judul}}">
        </div>

        <div class="grup">
           <label for="">Status</label>
           <select name="status" class="form-control" id="">
            <option value="0" @if ($data->status=="0")selected @endif>Belum DiProsess</option>
            <option value="1" @if ($data->status=="1")selected @endif>Sedang DiProsess</option>
            <option value="2" @if ($data->status=="2")selected @endif>Selesai</option>
           </select>
        </div>
    
        <div class="grup">Catatan</div>
        <textarea name="catatan" id="" cols="30" rows="10" class="tinymce-editor"></textarea>

        <button class="btn btn-primary mt-3"><i class="bi bi-floppy"></i> Jawab Pengaduan</button>
    </form>
</div>
@endsection

