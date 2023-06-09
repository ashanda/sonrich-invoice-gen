@extends('layouts.app')

@section('content')
<div class="content">

    <h1>Edit Staff Member</h1>

    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $staff->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $staff->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="0" {{ $staff->type === 'user' ? 'selected' : '' }}>Agent</option>
                <option value="3" {{ $staff->type === 'manager' ? 'selected' : '' }}>Account Manager</option>
                <option value="2" {{ $staff->type === 'deliver' ? 'selected' : '' }}>Delivery Department</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
