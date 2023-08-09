<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use Illuminate\Http\Request;

class BoothController extends Controller
{

    public function index(Request $request)
    {
        $booths = Booth::all();
        return response()->json($booths, 200);
    }

    public function single_booth(Request $request, $id)
    {
        $booth = Booth::findOrFail($id);
        return response()->json($booth, 200);
    }
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'booth_name' => 'required|string',
            'booth_address' => 'required|string',
            'booth_helpline' => 'required|string',
            'booth_email' => 'required|string'
        ]);
        $booth = Booth::create(
            [
                'booth_name' => $request->booth_name,
                'booth_address' => $request->booth_address,
                'booth_helpline' => $request->booth_helpline,
                'booth_email' => $request->booth_email
            ]
        );
        return response()->json([
            'message' => 'Booth Created Successfully',
            'status' => 'success',
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $booth = Booth::findOrFail($id);

        $booth->booth_name = $request->input('booth_name');
        $booth->booth_address = $request->input('booth_address');
        $booth->booth_helpline = $request->input('booth_helpline');
        $booth->booth_email = $request->input('booth_email');
        $booth->save();

        return response()->json(
            [
                'message' => 'Booths Updated Successfully',
                'status' => 'updated'
            ]
        );
    }

    public function destroy(Request $request, $id)
    {
        $booth = Booth::where('id', $id)->first();
        if (!$booth) {
            return response()->json([
                'message' => 'Booth Not Found',
                'status' => 'error'
            ], 404);
        }
        $booth->delete();
        return response()->json([
            'message' => 'Booth Deleted Successfully',
            'status' => 'success'
        ], 200);
    }
}
