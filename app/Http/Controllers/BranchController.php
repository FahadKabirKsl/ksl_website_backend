<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index(Request $request)
    {
        $branches = Branch::all();
        return response()->json($branches, 200);
    }

    public function single_branch(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);
        return response()->json($branch, 200);
    }

    public function store(Request $request)
    {

        $request->validate([
            'branch_name' => 'required|string',
            'branch_address' => 'required|string',
            'branch_email' => 'required|string'
        ]);
        $branch = Branch::create(
            [
                'branch_name' => $request->branch_name,
                'branch_address' => $request->branch_address,
                'branch_helpline_1' => $request->branch_helpline_1,
                'branch_helpline_2' => $request->branch_helpline_2,
                'branch_email' => $request->branch_email
            ]
        );
        return response()->json([
            'message' => 'Branch Created Successfully',
            'status' => 'success',
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $branch->branch_name = $request->input('branch_name');
        $branch->branch_address = $request->input('branch_address');
        $branch->branch_helpline_1 = $request->input('branch_helpline_1');
        $branch->branch_helpline_2 = $request->input('branch_helpline_2');
        $branch->branch_email = $request->input('branch_email');
        $branch->save();

        return response()->json(
            [
                'message' => 'Branch Updated Successfully',
                'status' => 'updated'
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        $branch = Branch::where('id', $id)->first();
        if (!$branch) {
            return response()->json([
                'message' => 'Branch Not Found',
                'status' => 'error'
            ], 404);
        }
        $branch->delete();
        return response()->json([
            'message' => 'Branch Deleted Successfully',
            'status' => 'success'
        ], 200);
    }
}
