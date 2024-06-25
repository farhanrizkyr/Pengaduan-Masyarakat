@extends('Components.Layout')
@section('title','Register Admin')
    

@section('main')
<div class="pagetitle">
    <h1>Halaman Register Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item">Halaman Register Admin</li>
      </ol>
    </nav>
  </div>

@if (Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{session::get('status')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary  mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi bi-plus"></i> Buat Account Admin
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-add"></i> Buat Account Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/admin/proses-register/" method="post">
        @csrf
          <div class="grup">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" id="">
            @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror
          </div>

          
          <div class="grup">
            <label for="">E-Mail</label>
            <input type="text" name="email" class="form-control" id="">
            @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
          </div>

          
          <div class="grup">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" id="">
            @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror
          </div>

          
          <div class="grup">
            <label for="">Konfirmasi Password</label>
            <input type="password"name="password_confirmation" class="form-control" id="">
          </div>
          @error('password_confirmation')
          <p class="text-danger">{{$message}}</p>
          @enderror
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="card table-rsponsive">
  <table class="table datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Username</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($admins as $admin)
      <tr>
        <th>{{$loop->iteration}}</th>
        <td>{{$admin->name}}</td>
        <td>{{$admin->username}}</td>
        <td>
          <form action="/admin/admin-delete/{{$admin->id}}" method="post" class="d-inline">
            @csrf
            @method('delete')
           <button class="btn btn-outline-danger" onclick="return confirm('Yakin Ingin NMenghapus?')"> <i class="bi bi-trash"></i></button>
           </form>
        </td>
      </tr>
      <tr>
        @endforeach
      
    </tbody>
  </table>
</div>

  

  
@endsection