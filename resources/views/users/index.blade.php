@extends('layouts.base')
@section('content')

<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
  <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
  </ul>
  <div class="container">
      <div class="row">
          <div class="col-12">
              <h3>User Dashboard</h3>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="{{route('app.index')}}">
                              <i class="fas fa-home"></i>
                          </a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</section>

  <h1>my order :</h1>  

  <a href="{{ route('thankyou.index') }}" class="btn btn-success mb-3">order </a>
@endsection