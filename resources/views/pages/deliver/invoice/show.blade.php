@extends('layouts.app')

@section('link')

@endsection

@section('content')
<style type="text/css">
    .modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fff;
  margin: 10% auto;
  padding: 20px;
  width: 80%;
  max-width: 400px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('deliver.print', $invoice->id) }}" method="POST" class="invoicePrintForm">
            @csrf
            @method('PUT')

            <button type="submit" id="saveButton" data-confirm-save="true" class="btn btn-primary mb-2">Print</button>
            <a href="{{ route('invoice.index') }}" class="btn btn-warning mb-2">You Click the button and you can't again this invoioce print</a>
            
        </form>
        
        <button class="btn btn-warning mb-2" id="openModalButton">remark</button>
        <hr>
        <form action="{{ route('deliver.update', $invoice->id) }}" method="POST" class="invoicePrintForm2">
            @csrf
            @method('PUT')

        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
<label for="delivery_code">First Call:</label>
          <input type="date" name="fcd" id="delivery_code" value="{{ $invoice->first_call }}"  class="form-control"  >
            </div>
            <div class="col-md-2">
<label for="delivery_code">Address:</label>
  <select name="fca" id="delivery_code" class="form-control">
      <option value="1" {{ $invoice->first_call_address == 1 ? 'selected' : '' }}>OK</option>
      <option value="0" {{ $invoice->first_call_address == 0 ? 'selected' : '' }}>NO</option>
  </select>

            </div>
            <div class="col-md-7">
<label for="delivery_code">Reason:</label>
          <textarea name="fcr" id="customerAddress" class="form-control" >{{ $invoice->first_call_reason }}</textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
<label for="delivery_code">Second Call:</label>
          <input type="date" name="scd" id="delivery_code" value="{{ $invoice->secound_call }}"  class="form-control"  >
            </div>
            <div class="col-md-2">
<label for="delivery_code">Address:</label>
<select name="sca" id="delivery_code" class="form-control">
    <option value="1" {{ $invoice->secound_call_address == 1 ? 'selected' : '' }}>OK</option>
    <option value="0" {{ $invoice->secound_call_address == 0 ? 'selected' : '' }}>NO</option>
</select>

            </div>
            <div class="col-md-7">
<label for="delivery_code">Reason:</label>
          <textarea name="scr" id="customerAddress" class="form-control" >{{ $invoice->secound_call_reason }}</textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
<label for="delivery_code">Third Call:</label>
          <input type="date" name="tcd" id="delivery_code" value="{{ $invoice->third_call }}"  class="form-control"  >
            </div>
            <div class="col-md-2">
<label for="delivery_code">Address:</label>
<select name="tca" id="delivery_code" class="form-control">
    <option value="1" {{ $invoice->third_call_address == 1 ? 'selected' : '' }}>OK</option>
    <option value="0" {{ $invoice->third_call_address == 0 ? 'selected' : '' }}>NO</option>
</select>
            </div>
            <div class="col-md-7">
<label for="delivery_code">Reason:</label>
         <textarea name="tcr" id="customerAddress" class="form-control" >{{ $invoice->third_call_reason }}</textarea>
            </div>
          </div>
      </div>
      <div class="form-group">
          <label for="company">Company:</label>
          <input type="text" name="company" id="company" value="{{ $invoice->companies->company_name }}" readonly class="form-control"  >
      </div>
        <div class="form-group">
          <label for="delivery_code">Delivery code:</label>
          <input type="text" name="delivery_code" id="delivery_code" value="{{ $invoice->delivery_code }}" readonly class="form-control"  >
      </div>
      <div class="form-group">
          <label for="delivery_id">Delivery Id:</label>
          <input type="text" name="delivery_id" id="delivery_id" value="{{ $invoice->delivery_id }}" readonly class="form-control"  >
      </div>
        <div class="form-group">
            <label for="invoiceNo">Invoice No:</label>
            <input type="text" name="invoiceNo" id="invoiceNo" class="form-control" value="{{ $invoice->invoice_no }}" readonly>
        </div>

        <div class="form-group">
            <label for="customerName">Customer Name:</label>
            <input type="text" name="customerName" id="customerName" class="form-control" value="{{ $invoice->customer_name }}" >
        </div>

        <div class="form-group">
            <label for="customerAddress">Customer Address:</label>
            <textarea name="customerAddress" id="customerAddress" class="form-control" >{{ $invoice->customer_address }}</textarea>
        </div>

        <div class="form-group">
            <label for="customerDistrict">District:</label>
            <input type="text" name="customerDistrict" id="customerDistrict" class="form-control" value="{{ $invoice->customer_district }}" >
        </div>

        <div class="form-group">
            <label for="mobileNo1">Mobile No:</label>
            <input type="text" name="mobileNo1" id="mobileNo1" class="form-control" value="{{ $invoice->mobile_no1 }}" >
        </div>

        <div class="form-group">
            <label for="mobileNo2">Mobile No:</label>
            <input type="text" name="mobileNo2" id="mobileNo2" class="form-control" value="{{ $invoice->mobile_no2 }}" readonly>
        </div>

        {{-- <div class="form-group">
            <label for="mainProductPackage">Main Product Package:</label>

                <!-- Add other package options here -->
                <ul>  
                @foreach ($packages_main as $package_main)
                <li>{{ $package_main->title }}</li>
                @endforeach
                </ul>
        </div> --}}

        @php
            $selectedPackages = json_decode($invoice->main_product_package, true);
        @endphp

        @if ($selectedPackages != null && count($selectedPackages) > 0)
            <div class="form-group">
                <label for="mainProductPackage">Main Product Package:</label>
                <div class="selected-packages">
                    <ul class="list-unstyled">
                        @foreach ($packages_main as $package_main)
                            @if (in_array($package_main->id, $selectedPackages))
                                <li class="badge badge-info p-2 mb-2">
                                    {{ $package_main->title }}
                                </li> <!-- Display selected package title with a badge -->
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <p>No main product selected.</p>
        @endif


        @php
            $selectedPackages = json_decode($invoice->future_product_packages, true);
        @endphp

        @if ($selectedPackages != null && count($selectedPackages) > 0)
            <div class="form-group">
                <label for="mainProductPackage">Future Product Packages:</label>
                <div class="selected-packages">
                    <ul class="list-unstyled">
                        @foreach ($packages_future as $package_future)
                            @if (in_array($package_future->id, $selectedPackages))
                                <li class="badge badge-info p-2 mb-2">
                                    {{ $package_future->title }}
                                </li> <!-- Display selected package title with a badge -->
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <p>No future product selected.</p>
        @endif

        <div class="form-group">
            <label for="amount">Amount(Rs):</label>
            <input type="number" step="0.00" class="form-control" value="{{ $invoice->amount }}" readonly>
        </div>
        <div class="form-group">
          @if (Auth::user()->type == 'admin' || Auth::user()->type == 'deliver')
          <div class="form-group">
              <label for="amount">Remark:</label>
           
              <textarea name="remark" id="remark" class="form-control" cols="30" rows="10" readonly>{{ !empty($invoice->remark) ? $invoice->remark : '' }}</textarea>
          </div>
          @endif

      </div>
      <div class="form-group">
          <div class="row">

            <div class="col-md-5">
                    <label for="delivery_code">Taken by Office:</label>
                    <select name="tbo" id="delivery_code" class="form-control">
                        <option value="1" {{ $invoice->taken_by_office == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $invoice->taken_by_office == 0 ? 'selected' : '' }}>NO</option>
                    </select>

                                </div>
                                <div class="col-md-7">
                    <label for="delivery_code">Reason:</label>
                            <textarea name="tbr" id="customerAddress" class="form-control" >{{ $invoice->reason }}</textarea>
                                </div>
                            </div>
      </div>
      <button type="submit" id="saveButton2" data-confirm-save="true" class="btn btn-primary mb-2">Update</button>
       </form>
        </div>


    </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      
      <h2>Remark</h2>
  
      <form action="{{ route('deliver.note', $invoice->id) }}" method="POST" class="invoiceForm">
        @csrf
        @method('PUT')
        <div class="form-group">
          
           
              
                <textarea name="remark" id="remark" class="form-control" cols="30" rows="10" required>{{ !empty($invoice->remark) ? $invoice->remark : '' }}</textarea>
             
              
          
        </div>

        <!-- Add more form fields here -->
  
        <div>
          <button class="btn btn-success mb-2" type="submit">Submit</button>
        </div>
      </form>
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

      icon: '',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, print it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $('.invoicePrintForm').submit(); // Submit the form
            }
          });
        });

        $('#saveButton2').on('click', function(e) {
          e.preventDefault();
      
          Swal.fire({
            title: 'Confirm Update',

      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Update!'
          }).then((result) => {
            if (result.isConfirmed) {
                $('.invoicePrintForm2').submit(); // Submit the form
            }
          });
        });
     
       
    });
      </script>
      <script>
        $(document).ready(function() {
          // Get the modal element
          var modal = $("#myModal");
        
          // Get the button that opens the modal
          var btn = $("#openModalButton");
        
          // Get the <span> element that closes the modal
          var span = $(".close");
        
          // When the button is clicked, open the modal
          btn.click(function() {
            modal.show();
          });
        
          // When the <span> element or outside the modal is clicked, close the modal
          span.click(function() {
            modal.hide();
          });
          $(window).click(function(event) {
            if (event.target == modal[0]) {
              modal.hide();
            }
          });
        });
        </script>

@endsection