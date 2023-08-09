<?php

namespace App\Http\Controllers;

use App\Models\Ipo;
use Illuminate\Http\Request;

class IpoController extends Controller
{
    public static function index(Request $request)
    {
        $ipos = Ipo::all();
        return response()->json($ipos, 200);
    }
    public static function single_ipo(Request $request, $id)
    {
        $ipo = Ipo::findOrFail($id);
        return response()->json($ipo, 200);
    }
    public static function store(Request $request)
    {
        //validation
        $request->validate(
            [
                'company_name' => 'required|string',
                'company_platform' => 'required|string',
                'company_about' => 'required|string',
                'key_highlights' => 'required|string',
                'founded' => 'required|string',
                'managing_director' => 'required|string',
                'parent_organization' => 'required|string',
                'minimum_invest' => 'required|string',
                'cutt_off_date' => 'required|date',
                'minimum_application_amount' => 'required|numeric',
                'total_share' => 'required|string',
                'eps' => 'required|numeric',
                'nav' => 'required|numeric',
                'rate' => 'required|integer',
                'type' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'listed_on' => 'required|string',
                'list_price' => 'required|string',
                'list_gains' => 'required|string',
                'offer_price' => 'required|string',
                'cupon_rate' => 'required|string',
                'status' =>  'required|in:upcoming_ipo,closing_ipo,listing_ipo,ongoing_ipo'
            ]
        );
        $ipo = Ipo::create(
            [
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
            ]
        );
        return response()->json([
            'message' => 'IPO Created Successfully',
            'status' => 'success'
        ], 200);
    }
    public static function update(Request $request, $id)
    {
        $ipo = Ipo::find($id);
        if (!$ipo) {
            return response()->json([
                'message' => 'IPO ID not found',
                'status' => 'error'
            ], 404);
        }

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

        return response()->json([
            'message' => 'IPO Updated Successfully',
            'status' => 'updated'
        ], 200);
    }
    public static function destroy(Request $request, $id)
    {
        if (empty($id)) {
            return response()->json([
                'message' => 'Id not Found',
                'status' => 'error'
            ], 400);
        }

        $ipo = Ipo::findOrFail($id);
        if (!$ipo) {
            return response()->json([
                'message' => 'IPO not found',
                'status' => 'error'
            ], 404);
        }

        $ipo->delete();
        return response()->json([
            'message' => 'IPO deleted successfully',
            'status' => 'success'
        ], 200);
    }
}
