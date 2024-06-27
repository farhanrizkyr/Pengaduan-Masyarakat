@extends('Components_User.Layout_User')
@section('title','Dashboard')
@section('main')
    <div class="row">
      <div class="col">
        <div class="card" style="padding:22px">
       <h3><i class="bi bi-clipboard-minus-fill text-primary"></i> Jumlah Pengaduan</h3>
       <span>{{Auth::user()->users->count()}}</span>
      </div>

      </div>

      <div class="col">
        <div class="card" style="padding:22px">
         <h3><i class="bi bi-clipboard-x text-danger"></i> Jumlah Pengaduan Belum Di tanggapi</h3>
           <span>{{$panding}}</span>
        </div>
  
        </div>
    </div>


 
    </div>


    <div class="row">
        <div class="col">
          <div class="card" style="padding:22px">
         <h3><i class="bi bi-arrow-repeat text-warning"></i> Jumlah Pengaduan  Di Proses Tanggapi</h3>
         <span>{{$proses}}</span>
        </div>
  
        </div>
  
        <div class="col">
          <div class="card" style="padding:22px">
           <h3><i class="bi bi-check2-circle text-success"></i> Jumlah Pengaduan Sudah Di tanggapi</h3>
             <span>{{$done}}</span>
          </div>
    
          </div>
      </div>
  
  
   
      </div>
@endsection

