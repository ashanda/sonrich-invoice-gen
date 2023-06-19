@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h1>Product Packages</h1>
        <a href="{{ route('product_packages.create') }}" class="btn btn-primary mb-2">Create New Product Package</a>
        <div class="table-responsive">
            <table id="dataTable" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Product Type</th>
                        <th>Product Items</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productPackages as $productPackage)
                    <tr>
                        <td>{{ $productPackage->id }}</td>
                        <td>{{ $productPackage->title }}</td>
                        <td>{{ $productPackage->amount }}</td>
                        <td>{{ $productPackage->product_type }}</td>
                        <td>
                            @php
                            $productItems = json_decode($productPackage->product_items);
                            @endphp
                            @foreach ($productItems as $productItem)
                            {{ ProductItemsGet($productItem)->title }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('product_packages.edit', $productPackage->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('product_packages.destroy', $productPackage->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product package?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection