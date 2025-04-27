@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('product_packages.update', $productPackage->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Package Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $productPackage->title }}">
            </div>



            <div class="form-group">
                <label for="product_items">Product Items:</label>
                <select name="product_items[]" class="form-control" multiple id="product_items">
                    @php
                    $productItemsArray = json_decode($productPackage->product_items, true);
                    @endphp
                    @foreach ($productItems as $productItem)
                    <option value="{{ $productItem->id }}" @if (in_array($productItem->id, $productItemsArray)) selected data-value="{{ $productItem->amount }}" @endif>{{ $productItem->title }}</option>

                    @endforeach
                </select>
            </div>
            <div id="quantity_fields">
                @php
                $quantities = json_decode($productqtys['quantity'], true) ?? [];
                @endphp
            
                @foreach ($quantities as $index => $quantity)
                    @php
                    $productItem = $productItems[$index];
                    @endphp
                    <div class="form-group quantity-field" data-product-id="{{ $productItem->id }}">
                        <label for="quantity_{{ $productItem->id }}">Quantity for {{ $productItem->title }}:</label>
                        <input type="number" name="quantity[]" class="form-control" id="quantity_{{ $productItem->id }}" min="1" value="{{ $quantity }}">
                    </div>
                @endforeach
                </div>
            
            
            
            
            
            

            <div class="form-group">
                <label for="product_items">Product Type:</label>
                <select name="product_type" class="form-control">
                    <option value="Main" {{ $productPackage->product_type == 'Main' ? 'selected' : '' }}>Main</option>
                    <option value="Future" {{ $productPackage->product_type == 'Future' ? 'selected' : '' }}>Future</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" min="1" name="amount" class="form-control" value="{{ $productPackage->amount }}" readonly>
            </div>
            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="number" name="discount" id="discount" class="form-control" value="{{ $productPackage->discount }}">
            </div>
            <div class="form-group">
                <label for="tax">Packaging, Distribution & Handling Fee:</label>
                <input type="number" name="tax" id="tax" class="form-control" value="{{ $productPackage->tax }}">
            </div>
            <div class="form-group">
                <label for="tax">Tax and Service Charges:</label>
                <input type="number" name="service_charge" id="tax" class="form-control" value="{{ $productPackage->service_charge ?? 0.00 }}" required>
            </div>
            <div class="form-group">
                <label for="deliver_fee">Deliver Fee:</label>
                <input type="number" name="deliver_fee" id="deliver_fee" class="form-control" value="{{ $productPackage->deliver_fee }}">
            </div>
            <div class="form-group">
                <label for="package_visibility">Package Visibility:</label>
                <select name="package_visibility" class="form-control">
                    <option value='0' {{ $productPackage->package_visibility == 0 ? 'selected' : '' }}>Hidden</option>
                    <option value='1' {{ $productPackage->package_visibility == 1 ? 'selected' : '' }}>Show</option>
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
</div>
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('product_items');
        const quantityFields = document.getElementById('quantity_fields');
        const amountInput = document.getElementById('amount');

        selectElement.addEventListener('change', updateQuantityFields);

        function updateQuantityFields() {
            quantityFields.innerHTML = ''; // Clear previous fields

            const selectedOptions = Array.from(selectElement.selectedOptions);

            selectedOptions.forEach(function(option) {
                const optionId = option.value;
                const optionTitle = option.text;
                const optionAmount = parseFloat(option.dataset.value);

                const div = document.createElement('div');
                div.classList.add('form-group', 'quantity-field');
                div.setAttribute('data-product-id', optionId);

                const label = document.createElement('label');
                label.setAttribute('for', 'quantity_' + optionId);
                label.innerHTML = 'Quantity for ' + optionTitle + ':';

                const input = document.createElement('input');
                input.setAttribute('type', 'number');
                input.setAttribute('name', 'quantity[]');
                input.classList.add('form-control');
                input.setAttribute('id', 'quantity_' + optionId);
                input.setAttribute('min', '1');
                input.setAttribute('value', '1');
                input.setAttribute('data-value', optionAmount);

                input.addEventListener('input', calculateTotalAmount); // Use the calculateTotalAmount function as the event listener

                div.appendChild(label);
                div.appendChild(input);

                quantityFields.appendChild(div);
            });

            calculateTotalAmount(); // Calculate total amount initially
        }

        function calculateTotalAmount() {
            let totalAmount = 0;

            const quantityInputs = Array.from(quantityFields.getElementsByClassName('quantity-field'));
            quantityInputs.forEach(function(div) {
    const input = div.querySelector('input');
    const quantityValue = parseFloat(input.value);
    const optionAmount = parseFloat(input.dataset.value);
    const optionTotal = optionAmount * quantityValue;
    totalAmount += optionTotal;
});

// Display the total amount in the 'amount' input field
amountInput.value = totalAmount.toFixed(2);
}
    // Get the selected quantity for a product ID

</script>
@endsection
@endsection