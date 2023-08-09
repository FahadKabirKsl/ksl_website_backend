<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\PartnerMail;
use App\Models\Partner;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;

use Illuminate\Support\Facades\Mail;


class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return response()->json([
            'partners' => $partners
        ], 200);
    }
    public function single_partner($id)
    {
        $partner = Partner::findOrFail($id);
        return response()->json(
            [
                'partner' => $partner
            ],
            200
        );
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

        return response()->json(
            [
                'message' => 'Partner Added Successfully & Sent a Mail',
                'status' => 'success'
            ]
        );
    }
}
