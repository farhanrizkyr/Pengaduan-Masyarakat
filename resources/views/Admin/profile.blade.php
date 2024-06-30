@extends('Components.Layout')
@section('title','Dashboard')
    

@section('main')
<div class="pagetitle">
    <h1>Halaman Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/dashboard/">Dashboard</a></li>
        <li class="breadcrumb-item">Profile</li>
      </ol>
    </nav>
  </div>

  <h5>Profile</h5>

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <h2>{{Auth::user()->name}}</h2>
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

  
@endsection