<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerMail;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function create()
    {
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $unions = Union::all();

        $partners = Partner::all();

        return view('layouts.dashboard.partner.create', compact('divisions', 'districts', 'upazilas', 'unions', 'partners'));
    }

    public function index()
    {
        $divisions = Division::paginate(10);
        $districts = District::paginate(10);
        $upazilas = Upazila::paginate(10);
        $unions = Union::paginate(10);
        $partners = Partner::paginate(10);

        return view('layouts.dashboard.partner.index', compact('divisions', 'districts', 'upazilas', 'unions', 'partners'));
    }

    public function store(Request $request)
    {
        $partner = new Partner();
        $partner->name = $request->input('name');
        $partner->email = $request->input('email');
        $partner->phoneNumber = $request->input('phoneNumber');
        $partner->reason = $request->input('reason');
        $partner->district_id = $request->input('district_id');
        $partner->division_id = $request->input('division_id');
        $partner->upazila_id = $request->input('upazila_id');
        $partner->union_id = $request->input('union_id');
        $partner->save();

        $district = District::find($partner->district_id);
        $division = Division::find($partner->division_id);
        $upazila = Upazila::find($partner->upazila_id);
        $union = Union::find($partner->union_id);

        Mail::to('sadrul@kslbd.net')->send(new PartnerMail(
            $partner->name,
            $partner->email,
            $partner->phoneNumber,
            $partner->reason,
            $district,
            $division,
            $upazila,
            $union
        ));
        return redirect()->route('partner.index')->with('create', 'Partner created successfully!');
    }
}
