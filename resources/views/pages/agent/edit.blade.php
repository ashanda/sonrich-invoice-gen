@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">

<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
@endsection

@section('content')
<style type="text/css">
    .tz-gallery {
        padding: 13px;
    }

    /* Override bootstrap column paddings */
    .tz-gallery .row>div {
        padding: 2px;
    }

    .tz-gallery .lightbox img {
        width: 100%;
        border-radius: 0;
        position: relative;
    }

    .tz-gallery .lightbox:before {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -13px;
        margin-left: -13px;
        opacity: 0;
        color: #fff;
        font-size: 26px;
        content: "\f002";
        font-family: "FontAwesome";
        pointer-events: none;
        z-index: 9000;
        transition: 0.4s;
    }


    .tz-gallery .lightbox:after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        background-color: rgba(46, 132, 206, 0.7);
        content: '';
        transition: 0.4s;
    }

    .tz-gallery .lightbox:hover:after,
    .tz-gallery .lightbox:hover:before {
        opacity: 1;
    }

    .baguetteBox-button {
        background-color: transparent !important;
    }

    @media(max-width: 768px) {
        body {
            padding: 0;
        }
    }

    .switch-field {
        display: flex;
        margin-bottom: 36px;
        overflow: hidden;
    }

    .switch-field input {
        position: absolute !important;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        width: 1px;
        border: 0;
        overflow: hidden;
    }

    .switch-field label {
        background-color: #e4e4e4;
        color: rgba(0, 0, 0, 0.6);
        font-size: 14px;
        line-height: 1;
        text-align: center;
        padding: 8px 16px;
        margin-right: -1px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        transition: all 0.1s ease-in-out;
    }

    .switch-field label:hover {
        cursor: pointer;
    }

    .switch-field input:checked+label {
        background-color: #ef8157;
        box-shadow: none;
    }

    .switch-field label:first-of-type {
        border-radius: 4px 0 0 4px;
    }

    .switch-field label:last-of-type {
        border-radius: 0 4px 4px 0;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <form id="invoiceForm" action="{{ route('invoice.update', $invoice->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="company">Company:</label>
                <select name="company" id="company" class="form-control" required>
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" 
                            {{ old('company', $invoice->company) == $company->id ? 'selected' : '' }}>
                            {{ $company->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="delivery_code">Delivery code:</label>
                <input type="text" name="delivery_code" id="delivery_code" value="{{ $invoice->delivery_code }}"  class="form-control"  >
            </div>
            <div class="form-group">
                <label for="delivery_id">Delivery Id:</label>
                <input type="text" name="delivery_id" id="delivery_id" value="{{ $invoice->delivery_id }}" class="form-control"  >
            </div>
            <div class="form-group">
                <label for="invoiceNo">Invoice No:</label>
                <input type="text" name="invoiceNo" id="invoiceNo" class="form-control" value="{{ $invoice->invoice_no }}" readonly>
            </div>

            <div class="form-group">
                <label for="sriNo1">SRI No:</label>
                <input type="text" name="sriNo1" id="sriNo1" class="form-control" value="{{ $invoice->sri_no1 }}">
            </div>

            <div class="form-group">
                <label for="sriNo2">SRI No:</label>
                <input type="text" name="sriNo2" id="sriNo2" class="form-control" value="{{ $invoice->sri_no2 }}">
            </div>

            <div class="form-group">
                <label for="sriNo3">SRI No:</label>
                <input type="text" name="sriNo3" id="sriNo3" class="form-control" value="{{ $invoice->sri_no3 }}">
            </div>
            @php
            $futurePlans = json_decode($invoice->future_plans);
            @endphp
            @if ($futurePlans != null)
            <div class="form-group">
                <label for="futurePlan">Future Plan:</label>
                <div id="futurePlanFields">
                    <!-- Existing future plans will be displayed here -->
                   
                    @foreach ($futurePlans as $plan)
                    <div class="form-group">
                        <label for="futurePlan{{$loop->iteration}}">Future Plan {{$loop->iteration}}:</label>
                        <input type="text" name="futurePlans[]" id="futurePlan{{$loop->iteration}}" class="form-control" value="{{$plan}}">
                        <button type="button" class="btn btn-danger removeFuturePlan my-0">Remove</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="addFuturePlan" class="btn btn-secondary">Add Future Plan</button>
            </div>
            @else
            <div class="form-group">
                <label for="futurePlan">Future Plan:</label>
                <div id="futurePlanFields">
                  <!-- Future plan input fields will be dynamically added here -->
                </div>
                <button type="button" id="addFuturePlan" class="btn btn-secondary">Add Future Plan</button>
              </div>
         
            @endif
            <div class="form-group">
                <label for="customerName">Customer Name:</label>
                <input type="text" name="customerName" id="customerName" class="form-control" value="{{ $invoice->customer_name }}">
            </div>

            <div class="form-group">
                <label for="customerAddress">Customer Address:</label>
                <textarea name="customerAddress" id="customerAddress" class="form-control">{{ $invoice->customer_address }}</textarea>
            </div>

            <div class="form-group">
                <label for="customerDistrict">District:</label>
                <input type="text" name="customerDistrict" id="customerDistrict" class="form-control" value="{{ $invoice->customer_district }}">
            </div>

            <div class="form-group">
                <label for="mobileNo1">Mobile No:</label>
                <input type="text" name="mobileNo1" id="mobileNo1" class="form-control" value="{{ $invoice->mobile_no1 }}">
            </div>

            <div class="form-group">
                <label for="mobileNo2">Mobile No:</label>
                <input type="text" name="mobileNo2" id="mobileNo2" class="form-control" value="{{ $invoice->mobile_no2 }}">
            </div>

            {{-- <div class="form-group">
                <label for="mainProductPackage">Main Product Package:</label>
                <select name="mainProductPackage" id="mainProductPackage" class="form-control">
                    <option value="N/A" data-main="{{ '0.00' }}">N/A</option>
                    <!-- Add other package options here -->
                    @foreach ($packages_main as $package_main)
                    <option value="{{ $package_main->id }}" data-main="{{ $package_main->amount }}" @if ($invoice->main_product_package == $package_main->id) selected @endif>{{ $package_main->title }}</option>
                    @endforeach
                </select>
            </div> --}}


            @php
            $selectedPackages = json_decode($invoice->main_product_package, true);
            @endphp
             @if ($selectedPackages != null)
            <div class="form-group">
                <label for="mainProductPackage">Main Product Package:</label>
                <select name="mainProductPackage[]" id="mainProductPackage" class="form-control" multiple>
                    <option value="N/A" data-main="{{ "0.00" }}">N/A</option>
                    @foreach ($packages_main as $package_main)
                    <option value="{{ $package_main->id }}" data-main="{{ $package_main->amount }}" @if (in_array($package_main->id, $selectedPackages)) selected @endif>{{ $package_main->title }}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="form-group">
                <label for="futureProductPackages">Future Product Packages:</label>
                <select name="futureProductPackages[]" id="futureProductPackages" class="form-control" multiple>
                  <option value="N/A" data-future="{{ "0.00" }}">N/A</option>
                  @foreach ( $packages_future as $package_future)
                  <option value="{{ $package_future->id }}" data-future="{{ $package_future->amount }}">{{ $package_future->title }}</option>
                  @endforeach
                </select>
              </div>
              @endif


            @php
            $selectedPackages = json_decode($invoice->future_product_packages, true);
            @endphp
             @if ($selectedPackages != null)
            <div class="form-group">
                <label for="futureProductPackages">Future Product Packages:</label>
                <select name="futureProductPackages[]" id="futureProductPackages" class="form-control" multiple>
                    <option value="N/A" data-future="{{ "0.00" }}">N/A</option>
                    @foreach ($packages_future as $package_future)
                    <option value="{{ $package_future->id }}" data-future="{{ $package_future->amount }}" @if (in_array($package_future->id, $selectedPackages)) selected @endif>{{ $package_future->title }}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="form-group">
                <label for="futureProductPackages">Future Product Packages:</label>
                <select name="futureProductPackages[]" id="futureProductPackages" class="form-control" multiple>
                  <option value="N/A" data-future="{{ "0.00" }}">N/A</option>
                  @foreach ( $packages_future as $package_future)
                  <option value="{{ $package_future->id }}" data-future="{{ $package_future->amount }}">{{ $package_future->title }}</option>
                  @endforeach
                </select>
              </div>
              @endif




            <div class="form-group">
                <label for="amount">Amount:</label>
                
                <input type="text" name="amount" id="amount" class="form-control" value="{{ $invoice->amount }}" readonly>
            </div>
            <div class="tz-gallery">

                <div class="row">

                    <div class="col-sm-12 col-md-4">
                        <a class="lightbox" href="{{ asset('attachments/'.$invoice->attachments1) }}">
                            <img src="{{ asset('attachments/'.$invoice->attachments1) }}">
                        </a>
                    </div>
                    @if ($invoice->attachments2 != NULL)
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="{{ asset('attachments/'.$invoice->attachments2) }}">
                            <img src="{{ asset('attachments/'.$invoice->attachments2) }}">
                        </a>
                    </div>
                    @endif
                    @if ($invoice->attachments3 != NULL)
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="{{ asset('attachments/'.$invoice->attachments3) }}">
                            <img src="{{ asset('attachments/'.$invoice->attachments3) }}">
                        </a>
                    </div>
                    @endif

                    @if ($invoice->attachments4 != NULL)
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="{{ asset('attachments/'.$invoice->attachments4) }}">
                            <img src="{{ asset('attachments/'.$invoice->attachments4) }}">
                        </a>
                    </div>
                    @endif
                    @if ($invoice->attachments5 != NULL)
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="{{ asset('attachments/'.$invoice->attachments5) }}">
                            <img src="{{ asset('attachments/'.$invoice->attachments5) }}">
                        </a>
                    </div>
                    @endif
                </div>

            </div>


            <div class="form-group">
                <label for="amount">All Fileds Checked?</label>
                <div class="switch-field">
                    <input type="radio" id="radio-one" name="switchone" value="checked" {{ $invoice->account_departmet_checked == 'checked' ? 'checked' : '' }} />
                    <label for="radio-one">Yes</label>
                    <input type="radio" id="radio-two" name="switchone" value="unchecked" {{ $invoice->account_departmet_checked == 'unchecked' ? 'checked' : '' }} />
                    <label for="radio-two">No</label>
                </div>

            </div>
            <button class="btn btn-primary" id="saveButton" data-confirm-save="true">Save</button>
            <button type="button" id="noButton" class="btn btn-secondary">NO</button>
        </form>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<script>
    $(document).ready(function() {
        var futurePlanCounter = {
            {
                count($futurePlans)
            }
        };

        // Add new future plan field
        $('#addFuturePlan').click(function() {
            futurePlanCounter++;

            var html = '<div class="form-group">' +
                '<label for="futurePlan' + futurePlanCounter + '">Future Plan ' + futurePlanCounter + ':</label>' +
                '<input type="text" name="futurePlans[]" id="futurePlan' + futurePlanCounter + '" class="form-control">' +
                '<button type="button" class="btn btn-danger removeFuturePlan my-0">Remove</button>' +
                '</div>';

            $('#futurePlanFields').append(html);
        });

        // Remove future plan field
        $('#futurePlanFields').on('click', '.removeFuturePlan', function() {
            $(this).parent().remove();
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
@endsection