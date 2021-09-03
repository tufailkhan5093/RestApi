<?php

namespace App\Http\Controllers;
use App\Referral;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $referral=Referral::all();

        return response()->json($referral,201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'referral_code'=>'required',
            'value'=>'required',
            'expire'=>'required|date|date_format:Y-m-d|after:yesterday',
            

        ]);
        return Referral::create($request->all());
    }

    public function show($id)
    {
        return Referral::find($id);
    }

    public function update(Request $request, $id)
    {
        $product=Referral::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id)
    {
        return Referral::destroy($id);
        return response()->json(["message"=>"Deleted"],201);
        
    }
}
