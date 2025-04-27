@extends('layouts.app')

@section('content')
<div class="content">
    
        <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Companies</h4>
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
                    </div>
    
                    
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>Logo</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>
                                        @if($company->logo)
                                            <img src="{{ asset('storage/' . $company->logo) }}" width="50" height="50">
                                        @else
                                            No Logo
                                        @endif
                                    </td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>{{ $company->telephone_number }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a> |
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>

@endsection

@section('script')
@if (session('success'))
                        <script>
                            Toastify({
                                text: "{{ session('success') }}",
                                backgroundColor: "green",
                                duration: 5000,
                                close: true,
                                gravity: "top",
                                position: "right",
                            }).showToast();
                        </script>
                    @endif

                    @if ($errors->any())
                        <script>
                            Toastify({
                                text: "{!! implode('<br>', $errors->all()) !!}",
                                backgroundColor: "red",
                                duration: 5000,
                                close: true,
                                gravity: "top",
                                position: "right",
                            }).showToast();
                        </script>
@endif
@if (session('error'))
    <script>
        Toastify({
            text: "{{ session('error') }}",
            backgroundColor: "red",
            duration: 5000,
            close: true,
            gravity: "top",
            position: "right",
        }).showToast();
    </script>
@endif

@endsection




