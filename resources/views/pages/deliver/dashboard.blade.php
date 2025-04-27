@extends('layouts.app')
@section('content')
<div class="content">
  @php
  if(Auth::user()->type == 'admin'){
  $role = 'Administrator';
  }elseif (Auth::user()->type == 'deliver') {
  $role = 'Delivery Department';
  }elseif (Auth::user()->type == 'manager') {
  $role = 'Account Department';
  }else{
  $role = 'Agent';
  }
  @endphp
  <div class="wel_sec bg-primary">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-5">
        <div class="left_sec py-4 px-5">
          <h1 class="text-light font-weight-bold ">Welcome Back, {{ Auth::user()->name }}</h1>
          <p class="text-light mt-3 desc">You’ve learned 70% of your goal this week!
            Keep it up and improve your progress.</p>
        </div>
      </div>
      {{-- {{ updateAllMainProductPackages() }} --}}
      <div class="col-md-1 col-lg-2 col-xl-2 d-none d-xl-inline"></div>
      <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
        <div class="left_sec text-center">
          <img class="w-100 right_img" src="{{ asset('img/Humaaans_Space.png')}}" alt="">
        </div>
      </div>
    </div>
  </div>

  </div>
  @endsection