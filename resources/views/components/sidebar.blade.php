<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="/" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="{{ asset('img/logo-small.png')}}">
      </div>
      <!-- <p>CT</p> -->
    </a>
    <a href="/" class="simple-text logo-normal">
      SONRICH
      <!-- <div class="logo-image-big">
        <img src="../assets/img/logo-big.png">
      </div> -->
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="active ">
        @php
            if(Auth::user()->type == 'admin'){
                $role = route('admin.home');
            }elseif (Auth::user()->type == 'deliver') {
                $role = route('deliver.home');
            }elseif (Auth::user()->type == 'manager') {
                $role = route('manager.home') ;
            }else{
                $role = route('home');
            }
        @endphp
        <a href="{{ $role }}">
          <i class="nc-icon nc-bank"></i>
          <p>Dashboard</p>
        </a>
      </li>
      @if (Auth::user()->type == 'admin' || Auth::user()->type == 'deliver' || Auth::user()->type == 'manager'|| Auth::user()->type == 'user')
      <li>
        <a href="{{ route('invoice.index') }}">
          <i class="nc-icon nc-paper"></i>
          <p>New Invoice</p>
        </a>
      </li>
      <li>
        <a href="{{ route('invoice.all') }}">
          <i class="nc-icon nc-paper"></i>
          <p>All Invoice</p>
        </a>
      </li>
     
      @endif
      @if (Auth::user()->type == 'admin' )
      <li>
        <a href="{{ route('companies.index') }}">
          <i class="nc-icon nc-badge"></i>
          <p>Companies</p>
        </a>
      </li>
      <li>
        <a href="{{ route('product_items.index') }}">
          <i class="nc-icon nc-bag-16"></i>
          <p>Product Items</p>
        </a>
      </li>
      <li>
        <a href="{{ route('product_packages.index') }}">
          <i class="nc-icon nc-box-2"></i>
          <p>Product Package</p>
        </a>
      </li>
      
      <li>
        <a href="{{ route('staff.index') }}">
          <i class="nc-icon nc-single-02"></i>
          <p>Staff</p>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.report') }}">
          <i class="nc-icon nc-bell-55"></i>
          <p>Reports</p>
        </a>
      </li> 
      <!-- <li>
        <a href="./tables.html">
          <i class="nc-icon nc-tile-56"></i>
          <p>Table List</p>
        </a>
      </li>
      <li>
        <a href="./typography.html">
          <i class="nc-icon nc-caps-small"></i>
          <p>Typography</p>
        </a>
      </li> -->
      @endif
        @if (Auth::user()->type == 'admin' || Auth::user()->type == 'deliver' || Auth::user()->type == 'manager' || Auth::user()->type == 'user')
        <li>
        <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="nc-icon nc-button-power"></i>
            <p>Logout</p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </a>
        </li>
        @endif
      <!-- <li class="active-pro">
        <a href="./upgrade.html">
          <i class="nc-icon nc-spaceship"></i>
          <p>Upgrade to PRO</p>
        </a>
      </li> -->
      
    </ul>
  </div>
</div>