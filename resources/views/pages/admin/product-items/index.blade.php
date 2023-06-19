@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h3>Product Items</h3>

        <a href="{{ route('product_items.create') }}" class="btn btn-primary mb-2">Create New Product Item</a>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="table-responsive">
            <table id="dataTable" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productItems as $productItem)
                    <tr>
                        <td>{{ $productItem->id }}</td>
                        <td>{{ $productItem->title }}</td>
                        <td>{{ $productItem->amount }}</td>
                        <td>
                            <a href="{{ route('product_items.edit', $productItem->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('product_items.destroy', $productItem->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <!-- <tr>
                        <td colspan="3">No product items found.</td>
                    </tr> -->
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection