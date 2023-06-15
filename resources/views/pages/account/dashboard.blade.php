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
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h3 class="card-title">Welcome Back {{ $role }}</h3>
            <h5 class="card-title mt-5">Hi..{{ Auth::user()->name }} </h5>
          </div>
          <div class="card-body ">
            <canvas id=chartHours width="400" height="100"></canvas>
          </div>

        </div>
      </div>
    </div>

  </div>
  @endsection