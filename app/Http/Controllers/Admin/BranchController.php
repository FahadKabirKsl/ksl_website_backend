<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public static function index()
    {
        $branches = Branch::all();
        return view('layouts.dashboard.branch.index', compact('branches'));
    }
    public static function create(Request $request)
    {
        $branches = Branch::all();
        return view('layouts.dashboard.branch.create', compact('branches'));
    }
    public static function store(Request $request)
    {
        $request->validate(
            [
                'branch_name' => 'required|string',
                'branch_address' => 'required|string',
                'branch_email' => 'required|string',
            ]
        );
        $branch = Branch::create([
            'branch_name' => $request->branch_name,
            'branch_address' => $request->branch_address,
            'branch_helpline_1' => $request->branch_helpline_1,
            'branch_helpline_2' => $request->branch_helpline_2,
            'branch_email' => $request->branch_email
        ]);
        session()->flash('create', 'Branch Created Successfully');
        return redirect()->route('branch.index');
    }
    public static function edit(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);
        return view('layouts.dashboard.branch.update', compact('branch'));
    }
    public static function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $branch->branch_name = $request->input('branch_name');
        $branch->branch_address = $request->input('branch_address');
        $branch->branch_helpline_1 = $request->input('branch_helpline_1');
        $branch->branch_helpline_2 = $request->input('branch_helpline_2');
        $branch->branch_email = $request->input('branch_email');
        $branch->save();
        session()->flash('update', 'Branch Updated Successfully');
        return redirect()->route('branch.index');
    }
    public static function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        session()->flash('delete', 'Branch Deleted Successfully');
        return redirect()->route('branch.index');
    }
}
