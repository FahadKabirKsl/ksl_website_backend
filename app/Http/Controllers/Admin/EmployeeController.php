<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('layouts.dashboard.employee.index', compact('employees'));
    }
    public function create()
    {
        $employees = Employee::all();
        return view('layouts.dashboard.employee.create', compact('employees'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'employee_type' => 'required|in:director,management_team',
                'employee_name' => 'required|string',
                'employee_designation' => 'required|string',
                // 'employee_contact_number' => 'required',
                'employee_about' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]
        );
        $image_path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->storeAs('Created_Employee_Images', $file->getClientOriginalName(), 'public');
        }
        $employee = Employee::create(
            [
                'employee_type' => $request->employee_type,
                'employee_name' => $request->employee_name,
                'employee_designation' => $request->employee_designation,
                'employee_contact_number' => $request->employee_contact_number,
                'employee_about' => $request->employee_about,
                'image' => $image_path,
            ]
        );
        session()->flash('create', 'Employee Created Successfully');
        return redirect()->route('employee.index');
    }
    public function update(Request $request, $id)
    {

        $employee = Employee::findOrFail($id);
        $employee->employee_type = $request->input('employee_type');
        $employee->employee_name = $request->input('employee_name');
        $employee->employee_designation = $request->input('employee_designation');
        $employee->employee_contact_number = $request->input('employee_contact_number');
        $employee->employee_about = $request->input('employee_about');

        if ($request->hasFile('image')) {
            if ($employee->image) {
                Storage::delete($employee->image);
            }
            $file = $request->file('image');
            $image_path = $file->storeAs('Updated_Employee_Images', $file->getClientOriginalName(), 'public');
            $employee->image = str_replace('public/', '', $image_path);
        }
        $employee->save();
        session()->flash('update', 'Employee Updated Successfully');
        return redirect()->route('employee.index');
    }
    public function edit(Request $request, $id)
    {
        $employee = Employee::findOrfail($id);
        return view('layouts.dashboard.employee.update', compact('employee'));
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        session()->flash('delete', 'Employee Deleted Successfully');
        return redirect()->route('employee.index');
    }
}
