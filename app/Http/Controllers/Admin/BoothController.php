<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booth;
use Illuminate\Http\Request;

class BoothController extends Controller
{
    public static function index()
    {
        $booths = Booth::simplePaginate(8);
        return view('layouts.dashboard.booth.index', compact('booths'));
    }
    public static function create(Request $request)
    {
        $booths = Booth::all();
        return view('layouts.dashboard.booth.create', compact('booths'));
    }
    public static function store(Request $request)
    {
        $request->validate(
            [
                'booth_name' => 'required|string',
                'booth_address' => 'required|string',
                'booth_helpline' => 'required|string',
                'booth_email' => 'required|string',
            ]
        );
        $booths = Booth::create(
            [
                'booth_name' => $request->booth_name,
                'booth_address' => $request->booth_address,
                'booth_helpline' => $request->booth_helpline,
                'booth_email' => $request->booth_email
            ]
        );
        session()->flash('create', 'Digital Booth Created Successfully');
        return redirect()->route('booth.index');
    }
    public function edit($id)
    {
        $booth = Booth::findOrFail($id);
        return view('layouts.dashboard.booth.update', compact('booth'));
    }
    public function update(Request $request, $id)
    {

        $booth = Booth::findOrFail($id);

        $booth->booth_name = $request->input('booth_name');
        $booth->booth_address = $request->input('booth_address');
        $booth->booth_helpline = $request->input('booth_helpline');
        $booth->booth_email = $request->input('booth_email');
        $booth->save();

        session()->flash('update', 'Digital Booth Updated Successfully');
        return redirect()->route('booth.index');
    }
    public function destroy($id)
    {
        $booths = Booth::findOrFail($id);
        $booths->delete();
        session()->flash('delete', 'Digital Booth Deleted Successfully');
        return redirect()->route('booth.index');
    }
}
