@extends('layouts.app')

@section('content')
<div class="content">

    <h1>Staff Members</h1>
    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Create Staff Member</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table id="dataTable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    @php
                    if($member->type == 'admin'){
                        $role = 'Administrator';
                    }elseif ($member->type == 'deliver') {
                        $role = 'Delivery Department';
                    }elseif ($member->type == 'manager') {
                        $role = 'Account Department';
                    }else{
                        $role = 'Agent';
                    }
                    @endphp
                    <td>{{ $role }}</td>
                    <td>
                        <a href="{{ route('staff.edit', $member->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('staff.destroy', $member->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>


@endsection
