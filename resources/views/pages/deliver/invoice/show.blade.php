@extends('layouts.app')

@section('link')

@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <form action="{{ route('deliver.update', $invoice->id) }}" method="POST" class="invoiceForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="delivery_code">Delivery code:</label>
                <input type="text" name="delivery_code" id="delivery_code" class="form-control"  >
            </div>
            <div class="form-group">
                <label for="delivery_id">Delivery Id:</label>
                <input type="text" name="delivery_id" id="delivery_id" class="form-control"  >
            </div>
            <button type="submit" id="saveButton" data-confirm-save="true" class="btn btn-primary mb-2">Print</button>
            <a href="{{ route('invoice.index') }}" class="btn btn-warning mb-2">You Click the button and you can't again this invoioce print</a>
        </form>
       
        <hr>
        <div class="form-group">
            <label for="invoiceNo">Invoice No:</label>
            <input type="text" name="invoiceNo" id="invoiceNo" class="form-control" value="{{ $invoice->invoice_no }}" readonly>
        </div>

        <div class="form-group">
            <label for="customerName">Customer Name:</label>
            <input type="text" name="customerName" id="customerName" class="form-control" value="{{ $invoice->customer_name }}" readonly>
        </div>

        <div class="form-group">
            <label for="customerAddress">Customer Address:</label>
            <textarea name="customerAddress" id="customerAddress" class="form-control" readonly>{{ $invoice->customer_address }}</textarea>
        </div>

        <div class="form-group">
            <label for="customerDistrict">District:</label>
            <input type="text" name="customerDistrict" id="customerDistrict" class="form-control" value="{{ $invoice->customer_district }}" readonly>
        </div>

        <div class="form-group">
            <label for="mobileNo1">Mobile No:</label>
            <input type="text" name="mobileNo1" id="mobileNo1" class="form-control" value="{{ $invoice->mobile_no1 }}" readonly>
        </div>

        <div class="form-group">
            <label for="mobileNo2">Mobile No:</label>
            <input type="text" name="mobileNo2" id="mobileNo2" class="form-control" value="{{ $invoice->mobile_no2 }}" readonly>
        </div>

        <div class="form-group">
            <label for="mainProductPackage">Main Product Package:</label>

                <!-- Add other package options here -->
                <ul>  
                @foreach ($packages_main as $package_main)
                <li>{{ $package_main->title }}</li>
                @endforeach
                </ul>
        </div>
        @php
        $selectedPackages = json_decode($invoice->future_product_packages, true);
        @endphp
        <div class="form-group">
            <label for="futureProductPackages">Future Product Packages:</label>
            <ul> 
                @foreach ($packages_future as $package_future)
                    <li>{{ $package_future->title }}</li>
                @endforeach
            </ul>
        </div>

        <div class="form-group">
            <label for="amount">Amount(Rs):</label>
            <input type="number" step="0.00" class="form-control" value="{{ $invoice->amount }}" readonly>
        </div>

        </div>


    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#saveButton').on('click', function(e) {
          e.preventDefault();
      
          Swal.fire({
            title: 'Confirm Print',

      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, print it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $('.invoiceForm').submit(); // Submit the form
            }
          });
        });
     
       
    });
      </script>

@endsection