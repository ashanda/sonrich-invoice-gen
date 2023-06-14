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

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

@endsection