@extends('Components_User.Layout_User')
@section('title','Edit Profile')
@section('main')

                <div class="container">
                    @if (Session::get('status'))
                    <div class="alert alert-success  alert-dismissible fade show" role="alert">
                        <strong>Berhasil</strong>{{Session::get('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                <div class="card" style="padding:20px">
                  <form action="proses-edit-profile/{{Auth::user()->id}}" method="post">
                    @csrf
                    <div class="grup">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                      @error('name')
                         <p class="danger">{{$message}}</p> 
                      @enderror
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
    
                      <div class="grup">
                        <label for="">Tempat</label>
                        <input type="text" name="tempat" class="form-control" value="{{Auth::user()->tempat}}">
                      </div>
    
                      <div class="grup">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tl" class="form-control" value="{{Auth::user()->tl}}">
                      </div>
    
                      <div class="grup">
                        <label for="">HP</label>
                        <input type="text" name="hp" class="form-control" value="{{Auth::user()->hp}}">
                      </div>

                      <div class="grup">
                        <label for="">Bio</label>
                        <textarea name="bio" style="background:whete" class="tinymce-editor">
                          {{Auth::user()->bio}}
                        </textarea><!-- End TinyMCE Editor -->
                      </div>

                      <button class="btn btn-primary mt-3"><i class="bi bi-floppy"></i> Update</button>
                  </form>
                </div>

                </div>

@endsection