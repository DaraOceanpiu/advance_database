@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Departments</h1>
            <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $department->department_id }}</td>
                            <td>{{ $department->department_name }}</td>
                            <td>
                                <a href="{{ route('departments.edit', $department->department_id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('departments.destroy', $department->department_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
