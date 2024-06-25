@extends('Components_User.Layout_User')
@section('title','Edit Profile')
@section('main')

                <div class="container">
                <div class="card" style="padding:20px">
                  <form action="edit-profile/{{Auth::user()->id}}" method="post">
                    @csrf
                    <div class="grup">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                      </div>
    
                      <div class="grup">
                        <label for="">Jenis Kelamin</label>
                         <select name="gender" class="form-control">
                            <option value="">Pilih</option>
                            <option value="0" @if (Auth::user()->gender=="0") selected @endif>Laki-Laki</option>
                            <option value="1" @if (Auth::user()->gender=="1") selected @endif>Perempuan</option>
                         </select>
                      </div>
    
                      <div class="grup">
                        <label for="">E-Mail</label>
                        <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                      </div>
    
                      <div class="grup">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}">
                      </div>
    
                      <div class="grup">
                        <label for="">Tempat</label>
                        <input type="text" name="tempat" class="form-control" value="{{Auth::user()->tempat}}">
                      </div>
    
                      <div class="grup">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="username" class="form-control" value="{{Auth::user()->tl}}">
                      </div>
    
                      <div class="grup">
                        <label for="">HP</label>
                        <input type="text" name="hp" class="form-control" value="{{Auth::user()->hp}}">
                      </div>

                      <button class="btn btn-primary mt-3"><i class="bi bi-floppy"></i> Update</button>
                  </form>
                </div>

                </div>

@endsection