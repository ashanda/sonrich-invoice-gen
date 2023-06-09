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
.tz-gallery .row > div {
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

.switch-field input:checked + label {
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
    <div class="container">

        
            <div class="form-group">
                <label for="invoiceNo">Invoice No:</label>
                <input type="text" name="invoiceNo" id="invoiceNo" class="form-control" value="{{ $invoice->invoice_no }}" readonly>
            </div>
        
            <div class="form-group">
                <label for="sriNo1">SRI No:</label>
                <input type="text" name="sriNo1" id="sriNo1" class="form-control" value="{{ $invoice->sri_no1 }}" readonly>
            </div>
        
            <div class="form-group">
                <label for="sriNo2">SRI No:</label>
                <input type="text" name="sriNo2" id="sriNo2" class="form-control" value="{{ $invoice->sri_no2 }}" readonly>
            </div>
        
            <div class="form-group">
                <label for="sriNo3">SRI No:</label>
                <input type="text" name="sriNo3" id="sriNo3" class="form-control" value="{{ $invoice->sri_no3 }}" readonly>
            </div>
        
            <div class="form-group">
                <label for="futurePlan">Future Plan:</label>
                <div id="futurePlanFields">
                    <!-- Existing future plans will be displayed here -->
                    @php
                        $futurePlans = json_decode($invoice->future_plans);
                    @endphp
                    @foreach ($futurePlans as $plan)
                        <div class="form-group">
                           
                            <input type="text" name="futurePlans[]" id="futurePlan{{$loop->iteration}}" class="form-control" value="{{$plan}}" readonly>

                        </div>
                    @endforeach
                </div>
                
            </div>
        
            <div class="form-group">
                <label for="customerName">Customer Name:</label>
                <input type="text" name="customerName" id="customerName" class="form-control" value="{{ $invoice->customer_name }}" readonly>
            </div>
        
            <div class="form-group">
                <label for="customerAddress">Customer Address:</label>
                <textarea name="customerAddress" id="customerAddress" class="form-control" readonly>{{ $invoice->customer_address }}</textarea >
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
                <select name="mainProductPackage" id="mainProductPackage" class="form-control" readonly>
                    <option value="N/A" data-main="{{ '0.00' }}">N/A</option>
                    <!-- Add other package options here -->
                    @foreach ($packages_main as $package_main)
                    <option value="{{ $package_main->id }}" data-main="{{ $package_main->amount }}"
                        @if ($invoice->main_product_package == $package_main->id) selected @endif>{{ $package_main->title }}</option>
                    @endforeach
                </select>
            </div>
            @php
            $selectedPackages = json_decode($invoice->future_product_packages, true);
            @endphp
            <div class="form-group">
                <label for="futureProductPackages">Future Product Packages:</label>
                <select name="futureProductPackages[]" id="futureProductPackages" class="form-control" multiple readonly>
                    <option value="N/A" data-future="{{ "0.00" }}">N/A</option>
                    @foreach ($packages_future as $package_future)
                    <option value="{{ $package_future->id }}" data-future="{{ $package_future->amount }}" @if (in_array($package_future->id, $selectedPackages)) selected @endif>{{ $package_future->title }}</option>
                @endforeach
                </select>
            </div>
            
                
                
            
            
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
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="{{ asset('attachments/'.$invoice->attachments2) }}">
                            <img src="{{ asset('attachments/'.$invoice->attachments2) }}">
                        </a>
                    </div>
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
             @if (Auth::user()->type == 'admin')
             <label for="amount">Account Departmet Checked?</label>
             @elseif (Auth::user()->type == 'manager')
             <label for="amount">All Fileds Checked?</label>
             @elseif (Auth::user()->type == 'deliver')   
             <label for="amount">Account Departmet Checked?</label>
             @else
             <label for="amount">Account Departmet Checked?</label>  
             @endif   
            
            <div class="switch-field">
                <input type="radio" id="radio-one" name="switchone" selected readonly/>
                <label for="radio-one">{{ $invoice->account_departmet_checked }}</label>
                
            </div>
            
            </div>
            <div class="form-group">
                @if (Auth::user()->type == 'admin')
                <label for="amount">Deliver Departmet Checked?</label>
                @elseif (Auth::user()->type == 'manager')
                <label for="amount">Deliver Departmet Checked?</label>
                @elseif (Auth::user()->type == 'deliver')   
                <label for="amount">Print Checked?</label>
                @else
                <label for="amount">Deliver Departmet Checked?</label>  
                @endif   
               
               <div class="switch-field">
                   <input type="radio" id="radio-one" name="switchone" selected readonly/>
                   <label for="radio-one">{{ $invoice->deliver_departmet_checked }}</label>
                   
               </div>
               
               </div>

</div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>

@endsection


