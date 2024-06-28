@extends('Components_Petugas.Layout_Petugas')
@section('title','List Hitory Pengaduan Masyarakat')
@section('main')

@if (Session::get('pesan'))
<div class="alert alert-success  alert-dismissible fade show" role="alert">
 <strong>Berhasil !</strong> {{Session::get('pesan')}}
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
@endif

<div class="card table-responsive">
    <table class="table datatable">
       <thead>
        <tr>
            <th>No</th>
            <th>Judul Pengaduan</th>
            <th>Status</th>
            <th>Nama Pelapor</th>
            <th>Tanggal Pengaduan</th>
            <th>Status</th>
            <th>Gambar</th>
            <th>Pengaduan</th>
            <th>Catatan Petugas</th>
            <th>Petugas</th>
        </tr>
       </thead>

       <tbody>
        @foreach ($pengaduans as $aduan)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$aduan->judul}}</td>
          <td>
            @if ($aduan->status=="2")
            <span class="badge badge-success">Selesai Diprosess</span>
            @endif

          </td>
          <td>{{$aduan->user->name}}</td>
          <td>{{\Carbon\carbon::parse($aduan->created_at)->isoformat('dddd,DD MMMM Y')}}</td>
          <td><img src="{{url('Bukti_Laporan',$aduan->gambar)}}" alt=""></td>
          <td>
            @if (strlen($aduan->pengaduan)>50)
                {!!substr($aduan->pengaduan,0,50)!!} <a href="#" data-bs-toggle="modal" data-bs-target="#detail-aduan{{$aduan->id}}">Lanjutkan.....</a>
                @else
                {!! $aduan->pengaduan !!}
            @endif
          </td>
          <td>
            @if (strlen($aduan->catatan)>50)
                {!!substr($aduan->catatan,0,50)!!} <a href="#" data-bs-toggle="modal" data-bs-target="#catatan/{{$aduan->id}}">Lanjutkan.....</a>
                @else
                {!! $aduan->catatan !!}
            @endif
          </td>
          <td>{{optional($aduan->petugas)->fullname()}}</td>
          
        </tr>
        @endforeach
       </tbody>


    </table>


</div>

@foreach ($pengaduans as $aduan)
    
<!-- Catatan Modal -->
<div class="modal fade" id="catatan/{{$aduan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {!! $aduan->catatan !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Catatan Modal -->
@endforeach


@foreach ($pengaduans as $aduan)
<!-- Modal -->
<div class="modal fade" id="detail-aduan{{$aduan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {!! $aduan->pengaduan !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
@endforeach
@endsection

