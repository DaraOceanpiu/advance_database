@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Staff</h1>
    <a href="{{ route('staff.create') }}" class="btn btn-primary">Add Staff</a>
    <table class="table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Staff Code</th>
                <th>Name</th>
                <th>Role</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Bonus</th>
                <th>Previous Hash</th>
                <th>Current Hash</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                @if ($staff->status_staff == 'insert' || $staff->status_staff == 'update')
                    <tr>
                        <!-- <td>{{ $staff->id }}</td> -->
                        <td>{{ $staff->staff_code }}</td>
                        <td>{{ $staff->first_name }} {{ $staff->last_name }}</td>
                        <td>{{ $staff->role->role_name ?? 'N/A' }}</td>
                        <td>{{ $staff->department->department_name ?? 'N/A' }}</td>
                        <td>{{ $staff->salary_amt }}</td>
                        <td>{{ $staff->bonus }}</td>
                        <td>{{ $staff->previousHash }}</td>
                        <td>{{ $staff->currentHash }}</td>
                        <td>
                            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div> 
@endsection
