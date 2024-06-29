@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Department</h1>
            <form action="{{ route('departments.update', $department->department_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" name="department_name" class="form-control" value="{{ $department->department_name }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
