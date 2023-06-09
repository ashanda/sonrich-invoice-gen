@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
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
                    <option value="{{ $productItem->id }}"  @if (in_array($productItem->id, $productItemsArray)) selected data-value="{{ $productItem->amount }}" @endif>{{ $productItem->title }}</option>
                    
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="product_items">Product Type:</label>
            <select name="product_type" class="form-control" >
                <option value="Main" {{ $productPackage->product_type == 'Main' ? 'selected' : '' }}>Main</option>
                <option value="Future" {{ $productPackage->product_type == 'Future' ? 'selected' : '' }}>Future</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" class="form-control" readonly>
        </div>
    
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
</div>
</div>
@endsection
