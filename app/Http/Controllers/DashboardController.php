<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = Staff::count();
        $totalDepartments = Department::count();
        $totalRoles = Role::count();
        return view('dashboard', compact('totalUsers', 'totalDepartments', 'totalRoles'));
    }
}
