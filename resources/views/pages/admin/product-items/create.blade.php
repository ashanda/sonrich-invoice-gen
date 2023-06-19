@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h3>Create Product Item</h3>

        <form action="{{ route('product_items.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" min="1" step="0" class="form-control" id="qty" name="qty">

            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" min="100" step="0.01" class="form-control" id="amount" name="amount">

            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('product_items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection