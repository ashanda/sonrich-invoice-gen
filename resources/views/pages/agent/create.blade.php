@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <form id="invoiceForm" action="{{ route('invoice.store') }}" enctype="multipart/form-data" method="POST">
      @csrf
      @php
      $prefix = 'INV-';
      $randomNumber = mt_rand(1000, 9999);
      $uniqueNumber = $prefix . time() . $randomNumber;

      @endphp
       <div class="form-group">
        <label for="company">Company:</label>
        <select name="company" id="company" class="form-control" required>
          <option value="">Select Company</option>
          @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
          @endforeach
        </select>
      </div>

       <div class="form-group">
        <label for="delivery_code">Delivery code:</label>
        <input type="text" name="delivery_code" id="delivery_code" class="form-control"  >
    </div>
    <div class="form-group">
        <label for="delivery_id">Delivery Id:</label>
        <input type="text" name="delivery_id" id="delivery_id" class="form-control"  >
    </div>
      <div class="form-group">
        <label for="invoiceNo">Invoice No:</label>
        <input type="text" name="invoiceNo" id="invoiceNo" class="form-control" value="{{  $uniqueNumber  }}" readonly>
      </div>

      <div class="form-group">
        <label for="sriNo1">SRI No:</label>
        <input type="text" name="sriNo1" id="sriNo1" class="form-control">
      </div>

      <div class="form-group">
        <label for="sriNo2">SRI No:</label>
        <input type="text" name="sriNo2" id="sriNo2" class="form-control">
      </div>

      <div class="form-group">
        <label for="sriNo3">SRI No:</label>
        <input type="text" name="sriNo3" id="sriNo3" class="form-control">
      </div>
      <div class="form-group">
        <label for="futurePlan">Future Plan:</label>
        <div id="futurePlanFields">
          <!-- Future plan input fields will be dynamically added here -->
        </div>
        <button type="button" id="addFuturePlan" class="btn btn-secondary">Add Future Plan</button>
      </div>
      <div class="form-group">
        <label for="customerName">Customer Name:</label>
        <input type="text" name="customerName" id="customerName" class="form-control">
      </div>

      <div class="form-group">
        <label for="customerAddress">Customer Address:</label>
        <textarea name="customerAddress" id="customerAddress" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label for="customerDistrict">District:</label>
        <input type="text" name="customerDistrict" id="customerDistrict" class="form-control">
      </div>

      <div class="form-group">
        <label for="mobileNo1">Mobile No:</label>
        <input type="text" name="mobileNo1" id="mobileNo1" class="form-control">
      </div>

      <div class="form-group">
        <label for="mobileNo2">Mobile No:</label>
        <input type="text" name="mobileNo2" id="mobileNo2" class="form-control">
      </div>

<!-- Main Product Package -->
<div class="form-group" style="margin-top: 30px">
    <label>Main Product Package:</label>
    <select name="mainProductPackage[]" id="mainProductPackage" class="form-control selectpicker" multiple data-live-search="true" data-width="100%">
        @foreach ($packages_main as $package_main)
            <option value="{{ $package_main->id }}"
                data-title="{{ $package_main->title }}"
                data-main="{{ ($package_main->amount + $package_main->tax + $package_main->service_charge + $package_main->deliver_fee) - $package_main->discount }}">
                {{ $package_main->title }}
            </option>
        @endforeach
    </select>
</div>

<!-- Dynamic Qty Inputs -->
<div id="mainProductQtyContainer" style="margin-top:20px;padding-left: 50px; padding-right: 50px;text-align: center"></div>

<!-- Future Product Package -->
<div class="form-group">
    <label>Future Product Packages:</label>
    <select name="futureProductPackages[]" id="futureProductPackages" class="form-control selectpicker" multiple data-live-search="true" data-width="100%">
        <option value="N/A" data-title="N/A" data-future="0.00">N/A</option>
        @foreach ($packages_future as $package_future)
            <option value="{{ $package_future->id }}"
                data-title="{{ $package_future->title }}"
                data-future="{{ ($package_future->amount + $package_future->tax + $package_future->service_charge + $package_future->deliver_fee) - $package_future->discount }}">
                {{ $package_future->title }}
            </option>
        @endforeach
    </select>
</div>

<!-- Dynamic Qty Inputs -->
<div id="futureProductQtyContainer" style="margin-top:20px;padding-left: 50px; padding-right: 50px;text-align: center"></div>

<!-- Final Total -->
<div class="form-group">
    <label>Total Amount:</label>
    <input type="text" name="amount" id="amount" class="form-control" readonly>
</div>


      <div class="form-group">
        <label for="attachments1">Attachments 01:</label>
        <div class="custom-file">
          <input type="file" name="attachments1" id="attachments1" class="custom-file-input" onchange="displayFileName(this, 'attachments1Label')">
          <label class="custom-file-label" id="attachments1Label" for="attachments1">Choose file</label>
        </div>
        <span id="attachments1FileName"></span>
      </div>

      <div class="form-group">
        <label for="attachments2">Attachments 02:</label>
        <div class="custom-file">
          <input type="file" name="attachments2" id="attachments2" class="custom-file-input" onchange="displayFileName(this, 'attachments2Label')">
          <label class="custom-file-label" id="attachments2Label" for="attachments2">Choose file</label>
        </div>
        <span id="attachments2FileName"></span>
      </div>

      <div class="form-group">
        <label for="attachments3">Attachments 03:</label>
        <div class="custom-file">
          <input type="file" name="attachments3" id="attachments3" class="custom-file-input" onchange="displayFileName(this, 'attachments3Label')">
          <label class="custom-file-label" id="attachments3Label" for="attachments3">Choose file</label>
        </div>
        <span id="attachments3FileName"></span>
      </div>

      <div class="form-group">
        <label for="attachments4">Attachments 04:</label>
        <div class="custom-file">
          <input type="file" name="attachments4" id="attachments4" class="custom-file-input" onchange="displayFileName(this, 'attachments4Label')">
          <label class="custom-file-label" id="attachments4Label" for="attachments4">Choose file</label>
        </div>
        <span id="attachments4FileName"></span>
      </div>

      <div class="form-group">
        <label for="attachments5">Attachments 05:</label>
        <div class="custom-file">
          <input type="file" name="attachments5" id="attachments5" class="custom-file-input" onchange="displayFileName(this, 'attachments5Label')">
          <label class="custom-file-label" id="attachments5Label" for="attachments5">Choose file</label>
        </div>
        <span id="attachments5FileName"></span>
      </div>
      <button class="btn btn-primary" id="saveButton" data-confirm-save="true">Save</button>

      <button type="button" id="noButton" class="btn btn-secondary">NO</button>
    </form>
  </div>
</div>
@endsection

@section('script')



<script type="text/javascript">
  $(document).ready(function() {
    $('.custom-file-input').on('change', function() {
      var fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass('selected').html(fileName);
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#saveButton').on('click', function(e) {
      e.preventDefault();

      Swal.fire({
        title: 'Confirm Save',
        text: 'Are you sure you want to save?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#invoiceForm').submit(); // Submit the form
        }
      });
    });
  });

</script>
<script>
  $(document).ready(function() {
      // Initialize the selectpicker
      $('.selectpicker').selectpicker();
  });
</script>

@endsection
