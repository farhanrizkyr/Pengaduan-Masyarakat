@extends('Components.Layout')
@section('title','Edit Profil')
@section('main')
<div class="container">
    @if (Session::get('status'))
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        <strong>Berhasil</strong>{{Session::get('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
<div class="card" style="padding:20px">
  <form action="/proses-edit-profile-admin/{{Auth::user()->id}}" method="post">
    @csrf
    <div class="grup">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
      @error('name')
         <p class="danger">{{$message}}</p> 
      @enderror
    </div>



      <div class="grup">
        <label for="">E-Mail</label>
        <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
        @error('email')
        <p class="danger">{{$message}}</p> 
     @enderror
    </div>

      <div class="grup">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}">
        @error('username')
         <p class="danger">{{$message}}</p> 
      @enderror
    </div>

     


      <button class="btn btn-primary mt-3"><i class="bi bi-floppy"></i> Update</button>
  </form>
</div>

</div>


@endsection