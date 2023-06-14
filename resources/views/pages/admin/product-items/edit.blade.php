@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h3>Edit Product Item</h3>

        <form action="{{ route('product_items.update', $productItem->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $productItem->title }}">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" min="100" step="0.01" class="form-control" id="amount" name="amount" value="{{ $productItem->amount }}">

            </div>
            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('product_items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection