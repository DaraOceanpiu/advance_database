@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Role</h1>
            <form action="{{ route('roles.update', $role->role_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="role_name">Role Name</label>
                    <input type="text" name="role_name" class="form-control" value="{{ $role->role_name }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
