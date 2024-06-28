@extends('Components_User.Layout_User')
@section('title','List  History Pengaduan masyarakat')
@section('main')

<div class="pagetitle">
    <h1>Halaman History Pengaduan Masyarakat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/apps-user/dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item">Halama History Pengaduan Masyarakat</li>
      </ol>
    </nav>
  </div>

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
            <th>Tanggal Pengaduan</th>
            <th>Status</th>
            <th>Gambar</th>
            <th>Pengaduan</th>
            <th>Catatan Petugas</th>
            <th>Petugas</th>
            <th>Aksi</th>
        </tr>
       </thead>

       <tbody>
        @foreach ($history as $aduan)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$aduan->judul}}</td>
          <td>{{\Carbon\carbon::parse($aduan->created_at)->isoformat('dddd,DD MMMM Y')}}</td>
          <td>
            @if ($aduan->status=="2")
            <span class="badge badge-success">Selesai Diprosess</span>
            @endif

            @if ($aduan->status=="1")
            <span class="badge bg-warning text-dark">Diprosess</span>
        @endif
          </td>
          <td><img src="{{url('Bukti_Laporan',$aduan->gambar)}}" alt=""></td>
          <td>
            @if (strlen($aduan->pengaduan)>50)
                {!!substr($aduan->pengaduan,0,50)!!} <a href="#" data-bs-toggle="modal" data-bs-target="#detail-aduan{{$aduan->id}}">Lanjutkan.....</a>
                @else
                {!! $aduan->pengaduan !!}
            @endif
          </td>
          <td> {!! $aduan->catatan !!}</td>
          <td>{{optional($aduan->petugas)->fullname()}}</td>
          <td>
            <form action="/apps-user/ajukan-laporan-kembali/{{$aduan->id}}" class="d-inline" method="post">
              @csrf
              @method('put')
               <button type="submit" onclick="return confirm('Yakin ingin mengajukan ulang')" class="btn btn-info"><i class="bi bi-arrow-repeat"></i></button>
            </form>
             <form action="/apps-user/histoty-delete/{{$aduan->id}}" method="post">
                @csrf
                @method('delete')
                <button onclick="return confirm('Yakin ingin menghapus')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
             </form>
          </td>
        </tr>
        @endforeach
       </tbody>


    </table>


</div>


@foreach ($history as $aduan)
<!-- Modal -->
<div class="modal fade" id="detail-aduan{{$aduan->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
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
