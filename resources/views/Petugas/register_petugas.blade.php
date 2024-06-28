@extends('Components.Layout')
@section('title','Petugas')
    

@section('main')
<div class="pagetitle">
    <h1>Halaman Petugas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item">Petugas</li>
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi bi-plus"></i> Buat Account Petugas
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-add"></i> Buat Account Petugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/register-petugas" method="post">
          @csrf
          <div class="grup">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">Bachelor's degree</label>
            <input type="text" name="degree" class="form-control" value="{{old('degree')}}">
            @error('degree')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          
          <div class="grup">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" value="{{old('username')}}">
            @error('username')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">e-mail</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">Jenis Kelamin</label>
           <select name="jenis_kelamin" class="form-control">
            <option value="">Pilih</option>
            <option value="0" @if(old('jenis_kelamin')=="0")selected @endif>Laki Laki</option>
            <option value="1" @if(old('jenis_kelamin')=="1")selected @endif>Perempuan</option>
           </select>
            @error('jenis_kelamin')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
            @error('password_confirmation')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          
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
        <th>Action</th>
      </tr>
     </thead>

     <tbody>
      @foreach ($data as $petugas)
      <tr>
        <th>{{$loop->iteration}}</th>
        <td>{{$petugas->fullname()}}</td>
        <td>{{$petugas->username}}</td>
        <td>
          <form action="/admin/delete-petugas/{{$petugas->id}}" method="post" class="d-inline">
          @csrf
          @method('delete')
          <button onclick="return confirm('Yakin Ingin Menghapus?')" type="submit" class="btn btn-danger"><i class="bil bi-trash"></i></button>
          </form>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-data/{{$petugas->id}}">
            <i class="bi bi-pencil-square"></i>
          </button>

        </td>
      </tr>
      @endforeach
     </tbody>


  </table>
</div>

@foreach ($data as $petugas)
    <!-- Modal -->
<div class="modal fade" id="edit-data/{{$petugas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit Account Petugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/edit-petugas/{{$petugas->id}}" method="post">
          @csrf
          <div class="grup">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$petugas->name}}">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="">
              <option value="0" @if($petugas->jenis_kelamin)=="0" selected @endif>Laki-Laki</option>
              <option value="1" @if ($petugas->jenis_kelamin)=="1" selected @endif>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>


          <div class="grup">
            <label for="">Bachelor's degree</label>
            <input type="text" name="degree" class="form-control" value="{{$petugas->degree}}">
            @error('degree')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          
          <div class="grup">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" value="{{$petugas->username}}">
            @error('username')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="grup">
            <label for="">e-mail</label>
            <input type="text" name="email" class="form-control" value="{{$petugas->email}}">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

         
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endforeach
  
@endsection