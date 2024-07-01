@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Roles</h1>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->role_id }}</td>
                            <td>{{ $role->role_name }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role->role_id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('roles.destroy', $role->role_id) }}" method="POST" style="display:inline;">
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
