@extends('Components_Petugas.Layout_petugas')
@section('title','Profile')
@section('main')
    
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{Auth::user()->avatar()}}" alt="Profile" class="rounded-circle">
            <h2>{{Auth::user()->fullname()}}</h2>
              <button data-bs-toggle="modal" data-bs-target="#avatar" class="btn btn-outline-primary btn-sm mt-3"><i class="bi bi-floppy"></i> Change Avatar</button>
            <div class="social-links mt-2">
              
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title"></h5>
                <p class="small fst-italic">
                  
                </p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{Auth::user()->name}}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Gelar</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->degree}}</div>
                  </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Gender</div>
                  @if (Auth::user()->jenis_kelamin=="0")   
                  <div class="col-lg-9 col-md-8"> L- (Laki-Laki)</div>
                  @endif

                  @if (Auth::user()->jenis_kelamin=="1")   
                  <div class="col-lg-9 col-md-8"> P- (Perempuan)</div>
                  @endif

                  
                </div>



                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Username</div>
                  <div class="col-lg-9 col-md-8">{{Auth::user()->username}}</div>
                </div>

         
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                </div>

              </div>            
            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- Modal Bio -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">About Detail</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         {!!Auth::user()->bio!!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Bio -->

  <!-- Modal Avatar -->
<div class="modal fade" id="avatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Avatar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="/apps-petugas/update-avatar/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @if (Auth::user()->avatar)
          <input type="hidden" name="avatar_lama" value="{{Auth::user()->avatar}}">  
        @endif
        <div class="grup">
          <label for="">Pilih Avatar</label>
          <input type="file" name="avatar" class="form-control">
          @error('avatar')
              <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
  <!-- End Modal Avatar-->
@endsection
