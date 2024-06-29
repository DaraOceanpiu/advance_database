@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Staff</h2>
    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="staff_code">Staff Code</label>
            <input type="text" class="form-control" id="staff_code" name="staff_code" value="{{ $staff->staff_code }}" required>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $staff->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $staff->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male" {{ $staff->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $staff->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Paid" {{ $staff->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                <option value="Unpaid" {{ $staff->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
            </select>
        </div>
        <div class="form-group">
            <label for="employment_date">Employment Date</label>
            <input type="date" class="form-control" id="employment_date" name="employment_date" value="{{ $staff->employment_date }}" required>
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                @foreach($roles as $role)
                    <option value="{{ $role->role_id }}" {{ $staff->role_id == $role->role_id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department_id">Department</label>
            <select class="form-control" id="department_id" name="department_id" required>
                @foreach($departments as $department)
                    <option value="{{ $department->department_id }}" {{ $staff->department_id == $department->department_id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="salary_amt">Salary Amount</label>
            <input type="number" class="form-control" id="salary_amt" name="salary_amt" value="{{ $staff->salary_amt }}" required>
        </div>
        <div class="form-group">
            <label for="bonus">Bonus</label>
            <input type="number" class="form-control" id="bonus" name="bonus" value="{{ $staff->bonus }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
