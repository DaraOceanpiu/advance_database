<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Add this line

class StaffController extends Controller
{
    // Display a listing of the staff members
    public function index()
    {
        $staffs = Staff::with(['role', 'department'])
            ->whereIn('status_staff', ['insert', 'update']) // Only include non-deleted records
            ->get()
            ->groupBy('id')
            ->map(function ($group) {
                return $group->sortByDesc('version')->first();
            });
        return view('staff.index', ['staffs' => $staffs->values()]);
    }
    


    // Show the form for creating a new staff member
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('staff.create', compact('roles', 'departments'));
    }

    // Store a newly created staff member in storage
    // public function store(Request $request)
    // {
    //     $staff = new Staff();
    //     $staff->fill($request->all());
    //     $staff->status_staff = 'insert';
    //     $staff->version = 1;
    //     $staff->currentHash = $this->generateHash();
    //     $staff->save();

    //     return redirect()->route('staff.index');
    // }

    public function store(Request $request)
{
    $request->validate([
        'staff_code' => 'required',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string|max:10',
        'status' => 'required|string|max:10',
        'employment_date' => 'required|date',
        'role_id' => 'required|integer|exists:roles,role_id',
        'department_id' => 'required|integer|exists:departments,department_id',
        'salary_amt' => 'required|numeric',
        'bonus' => 'required|numeric',
    ]);

    $staff = new Staff();
    $staff->fill($request->all());
    $staff->status_staff = 'insert';
    $staff->version = 1;
    $staff->currentHash = $this->generateHash();
    $staff->save();

    return redirect()->route('staff.index');
}
    // Show the form for editing the specified staff member
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        $roles = Role::all();
        $departments = Department::all();
        return view('staff.edit', compact('staff', 'roles', 'departments'));
    }

    // Update the specified staff member in storage
    // public function update(Request $request, $id)
    // {
    //     $oldStaff = Staff::find($id);
    //     $newStaff = new Staff();

    //     $newStaff->fill($request->all());
    //     $newStaff->status_staff = 'update';
    //     $newStaff->version = $oldStaff->version + 1;
    //     $newStaff->previousHash = $oldStaff->currentHash;
    //     $newStaff->currentHash = $this->generateHash();
    //     $newStaff->previous_record_id = $oldStaff->id;
    //     $newStaff->save();

    //     // Prevent the old record from being deleted or appearing as a duplicate
    //     $oldStaff->status_staff = 'INSERT';
    //     $oldStaff->save();

    //     return redirect()->route('staff.index');
    // }
    public function update(Request $request, $id)
{
    $request->validate([
        'staff_code' => 'required',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|string|max:10',
        'status' => 'required|string|max:10',
        'employment_date' => 'required|date',
        'role_id' => 'required|integer|exists:roles,role_id',
        'department_id' => 'required|integer|exists:departments,department_id',
        'salary_amt' => 'required|numeric',
        'bonus' => 'required|numeric',
    ]);

    $oldStaff = Staff::find($id);
    $newStaff = new Staff();

    $newStaff->fill($request->all());
    $newStaff->status_staff = 'update';
    $newStaff->version = $oldStaff->version + 1;
    $newStaff->previousHash = $oldStaff->currentHash;
    $newStaff->currentHash = $this->generateHash();
    $newStaff->previous_record_id = $oldStaff->id;
    $newStaff->save();

    // Prevent the old record from being deleted or appearing as a duplicate
    $oldStaff->status_staff = 'INSERT';
    $oldStaff->save();

    return redirect()->route('staff.index');
}


    // Remove the specified staff member from storage
    // public function destroy($id)
    // {
    //     $oldStaff = Staff::find($id);
    //     $newStaff = $oldStaff->replicate();

    //     $newStaff->status_staff = 'delete';
    //     $newStaff->version = $oldStaff->version + 1;
    //     $newStaff->previousHash = $oldStaff->currentHash;
    //     $newStaff->currentHash = $this->generateHash();
    //     $newStaff->previous_record_id = $oldStaff->id;
    //     $newStaff->save();
        
    //     return redirect()->route('staff.index')->with('success', 'Record deleted successfully');

    // }
    public function destroy($id)
    {
        $oldStaff = Staff::find($id);
        if ($oldStaff) {
            $newStaff = $oldStaff->replicate();
            $newStaff->status_staff = 'delete';
            $newStaff->version = $oldStaff->version + 1;

            //keep it same update hash
            // $newStaff->previousHash = $oldStaff->previousHash; 
            // $newStaff->currentHash = $oldStaff->currentHash; 
            
            //OR wnat make it reasonable logic
             //   $newStaff->previousHash = $oldStaff->currentHash;
             //   $newStaff->currentHash = $this->generateHash();
              
             //OR wnat make it same logic of php version
               $newStaff->previousHash = $this->generateHash();
               $newStaff->currentHash = $this->generateHash();
              
             


            // $newStaff->previousHash = 0;  
            // $newStaff->currentHash = 0;
            $newStaff->previous_record_id = $oldStaff->id;
            $newStaff->save();

              // Prevent the old record from being deleted or appearing as a duplicate
        $oldStaff->status_staff = 'UPDATE';
        $oldStaff->save();
    
            return redirect()->route('staff.index')->with('success', 'Record deleted successfully');
        }
        
        return redirect()->route('staff.index')->with('error', 'Record not found');
    }
    

    

    // Generate a unique hash
    private function generateHash()
    {
        return bin2hex(random_bytes(16));
    }
}
