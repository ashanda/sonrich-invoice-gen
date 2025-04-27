@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('product_packages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Package Title:</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="product_items">Product Items:</label>
                <select name="product_items[]" class="form-control" multiple id="product_items">
                    @foreach ($productItems as $productItem)
                        <option value="{{ $productItem->id }}" data-value="{{ $productItem->amount }}">{{ $productItem->title }}</option>
                    @endforeach
                </select>
            </div>
            
            <div id="quantity_fields"></div>

            <div class="form-group">
                <label for="product_items">Product Type:</label>
                <select name="product_type" class="form-control">
                    <option value="{{ 'Main' }}">{{ 'Main'  }}</option>
                    <option value="{{ 'Future' }}">{{ 'Future' }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="amount">Discount:</label>
                <input type="number" name="discount" id="discount" class="form-control" >
            </div>
            <div class="form-group">
                <label for="amount">Packaging, Distribution & Handling Fee:</label>
                <input type="number" name="tax" id="tax" class="form-control" >
            </div>
            <div class="form-group">
                <label for="service_charge">Tax and Service Charges:</label>
                <input type="number" name="service_charge" id="service_charge" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="amount">Deliver Fee:</label>
                <input type="number" name="deliver_fee" id="deliver_fee" class="form-control" >
            </div>
            <div class="form-group">
                <label for="package_visibility">Package Visibility:</label>
                <select name="package_visibility" class="form-control">
                    <option value= '1' >Show</option>
                    <option value= '0' >Hidden</option>
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
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
                div.classList.add('form-group');

                const label = document.createElement('label');
                label.setAttribute('for', 'quantity_' + optionId);
                label.innerHTML = optionTitle + ' Quantity:';

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

            const quantityInputs = Array.from(quantityFields.getElementsByTagName('input'));

            quantityInputs.forEach(function(input) {
                const quantityValue = parseFloat(input.value);
                const optionAmount = parseFloat(input.dataset.value);
                const optionTotal = optionAmount * quantityValue;
                totalAmount += optionTotal;
            });

            // Display the total amount in the 'amount' input field
            amountInput.value = totalAmount.toFixed(2);
        }

        updateQuantityFields(); // Initialize the quantity fields
    });
</script>
@endsection
@endsection