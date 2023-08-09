<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();
        return response()->json($employees, 200);
    }

    public function single_employee(Request $request, $id)
    {
        $employee = Employee::find($id);
        return response()->json($employee, 200);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'employee_type' => 'required|in:director,management_team',
                'employee_name' => 'required',
                'employee_designation' => 'required',
                'employee_contact_number' => 'required',
                'employee_about' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
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
                'image' => $image_path
            ]
        );
        return response()->json(
            [
                'message' => 'Employee Created Successfully',
                'status' => 'success'
            ],
            200
        );
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->employee_type = $request->input('employee_type');
        $employee->employee_name = $request->input('employee_name');
        $employee->employee_designation = $request->input('employee_designation');
        $employee->employee_contact_number = $request->input('employee_contact_number');
        $employee->employee_about = $request->input('employee_about');

        // handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            if ($employee->image) {
                Storage::delete($employee->image);
            }
            $file = $request->file('image');
            $image_path = $file->storeAs('Updated_Employee_Images', $file->getClientOriginalName(), 'public');
            $employee->image = str_replace('public/', '', $image_path);
        }
        $employee->save();

        return response()->json(
            [
                'message' => 'Employee Updated Successfully',
                'status' => 'updated'
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();

        if (!$employee) {
            return response()->json([
                'message' => 'Employee Not Found',
                'status' => 'error'
            ], 404);
        }

        $employee->delete();

        return response()->json([
            'message' => 'Employee Deleted Successfully',
            'status' => 'success'
        ], 200);
    }
}