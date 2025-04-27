@extends('layouts.app')

@section('content')
<div class="content">
    
        <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Add Company</h4>
                        <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
                    </div>
    
                    

                  <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name:</label>
                                <input type="text" id="company_name" name="company_name" class="form-control" value="{{ old('company_name', $company->company_name) }}">
                            </div>
                        
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $company->address) }}">
                            </div>
                        
                            <div class="mb-3">
                                <label for="telephone_number" class="form-label">Telephone:</label>
                                <input type="text" id="telephone_number" name="telephone_number" class="form-control" value="{{ old('telephone_number', $company->telephone_number) }}">
                            </div>
                        
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $company->email) }}">
                            </div>
                        
                            <div class="mb-3">
                                <label for="current_logo" class="form-label">Current Logo:</label><br>
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100" alt="Company Logo">
                                @else
                                    <p>No Logo</p>
                                @endif
                            </div>
                        
                            <div class="mb-3">
                                <label for="logo" class="form-label">New Logo:</label>
                                <input type="file" id="logo" name="logo" class="form-control">
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        
                        
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

@endsection




