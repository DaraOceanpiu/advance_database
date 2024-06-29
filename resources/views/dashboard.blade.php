@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Dashboard</h1>
            <div class="card card-custom">
                <div class="card-body">
                    <h5 class="card-title">Total Users: {{ $totalUsers }}</h5>
                    <a href="{{ route('staff.index') }}" class="btn btn-custom">View Users</a>
                </div>
            </div>
            <div class="card card-custom mt-4">
                <div class="card-body">
                    <h5 class="card-title">Total Departments: {{ $totalDepartments }}</h5>
                    <a href="{{ route('departments.index') }}" class="btn btn-custom">View Departments</a>
                </div>
            </div>
            <div class="card card-custom mt-4">
                <div class="card-body">
                    <h5 class="card-title">Total Roles: {{ $totalRoles }}</h5>
                    <a href="{{ route('roles.index') }}" class="btn btn-custom">View Roles</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
