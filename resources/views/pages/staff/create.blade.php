@extends('layouts.app')

@section('content')
<div class="content">
 
    <h1>Create Staff Member</h1>

    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="0">Agent</option>
                <option value="2">Account Manager</option>
                <option value="3">Delivery Department</option>
               
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
