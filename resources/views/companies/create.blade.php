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
                        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name:</label>
                                <input type="text" id="company_name" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="telephone_number" class="form-label">Telephone:</label>
                                <input type="text" id="telephone_number" name="telephone_number" class="form-control" value="{{ old('telephone_number') }}" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo:</label>
                                <input type="file" id="logo" name="logo" class="form-control" required>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Save</button>
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
                                duration: 3000,
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
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                            }).showToast();
                        </script>
                    @endif

@endsection




