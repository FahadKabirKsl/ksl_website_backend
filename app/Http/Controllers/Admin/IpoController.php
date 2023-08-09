<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IpoController extends Controller
{
    public static function create(Request $request)
    {
        $ipos = Ipo::all();
        return view('layouts.dashboard.ipo.create', compact('ipos'));
    }
    public static function single_ipo_index(Request $request, $id, $company_name)
    {
        $ipo = Ipo::findOrFail($id);
        return view('layouts.dashboard.ipo.single_ipo_index', compact('ipo'));
    }
    public static function index()
    {
        $ongoing_ipo = Ipo::where('status', 'ongoing_ipo')->get();
        $upcoming_ipo = Ipo::where('status', 'upcoming_ipo')->get();
        $closing_ipo = Ipo::where('status', 'closing_ipo')->get();
        $listing_ipo = Ipo::where('status', 'listing_ipo')->get();

        return view('layouts.dashboard.ipo.index', compact('upcoming_ipo', 'closing_ipo', 'listing_ipo', 'ongoing_ipo'));
    }
    public static function store(Request $request)
    {
        $allowedStatus = ['upcoming_ipo', 'closing_ipo', 'listing_ipo', 'ongoing_ipo'];

        if (!in_array($request->status, $allowedStatus)) {
            return redirect()->route('ipo.index')->with('delete', 'Invalid status value');
        }
        $ipos = Ipo::create([
            'company_name' => $request->company_name,
            'company_platform' => $request->company_platform,
            'company_about' => $request->company_about,
            'key_highlights' => $request->key_highlights,
            'founded' => $request->founded,
            'managing_director' => $request->managing_director,
            'parent_organization' => $request->parent_organization,
            'minimum_invest' => $request->minimum_invest,
            'cutt_off_date' => $request->cutt_off_date,
            'minimum_application_amount' => $request->minimum_application_amount,
            'total_share' => $request->total_share,
            'eps' => $request->eps,
            'nav' => $request->nav,
            'rate' => $request->rate,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'listed_on' => $request->listed_on,
            'list_price' => $request->list_price,
            'list_gains' => $request->list_gains,
            'offer_price' => $request->offer_price,
            'cupon_rate' => $request->cupon_rate,
            'status' => $request->status
        ]);
        session()->flash(
            'create',
            [
                'status' => $request->status,
                'company_name' => $request->company_name,
                'message' => 'Created Successfully'
            ]
        );
        return redirect()->route('ipo.index');
    }
    public static function update(Request $request, $id)
    {
        $ipo = Ipo::findOrFail($id);
        $ipo->company_name = $request->input('company_name');
        $ipo->company_platform = $request->input('company_platform');
        $ipo->company_about = $request->input('company_about');
        $ipo->key_highlights = $request->input('key_highlights');
        $ipo->founded = $request->input('founded');
        $ipo->managing_director = $request->input('managing_director');
        $ipo->parent_organization = $request->input('parent_organization');
        $ipo->parent_organization = $request->input('parent_organization');
        $ipo->minimum_invest = $request->input('minimum_invest');
        $ipo->cutt_off_date = $request->input('cutt_off_date');
        $ipo->minimum_application_amount = $request->input('minimum_application_amount');
        $ipo->total_share = $request->input('total_share');
        $ipo->eps = $request->input('eps');
        $ipo->nav = $request->input('nav');
        $ipo->rate = $request->input('rate');
        $ipo->type = $request->input('type');
        $ipo->start_date = $request->input('start_date');
        $ipo->end_date = $request->input('end_date');
        $ipo->listed_on = $request->input('listed_on');
        $ipo->list_price = $request->input('list_price');
        $ipo->list_gains = $request->input('list_gains');
        $ipo->offer_price = $request->input('offer_price');
        $ipo->cupon_rate = $request->input('cupon_rate');
        $ipo->status = $request->input('status');
        $ipo->save();

        session()->flash(
            'update',
            [
                'status' => $request->status,
                'company_name' => $request->company_name,
                'message' => 'Updated Successfully'
            ]
        );
        return redirect()->route('ipo.index');
    }
    public static function edit(Request $request, $id)
    {
        $ipo = Ipo::findOrFail($id);
        return view('layouts.dashboard.ipo.update', compact('ipo'));
    }
    public static function destroy(Request $request, $id)
    {
        $ipo = Ipo::findOrFail($id);
        $ipo->delete();

        session()->flash(
            'delete',
            [
                'status' => $request->status,
                'company_name' => $request->company_name,
                'message' => 'Deleted successfully'
            ]
        );
        return redirect()->route('ipo.index');
    }
}
