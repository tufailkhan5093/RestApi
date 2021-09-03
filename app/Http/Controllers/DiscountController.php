<?php

namespace App\Http\Controllers;
use App\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discount=Discount::all();

        return response()->json($discount,201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'discount_code'=>'required',
            'value'=>'required',
            'expire'=>'required|date|date_format:Y-m-d|after:yesterday',
            

        ]);
        return Discount::create($request->all());
    }

    public function show($id)
    {
        return Discount::find($id);
    }

    public function update(Request $request, $id)
    {
        $product=Discount::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id)
    {
        return Discount::destroy($id);
        return response()->json(["message"=>"Deleted"],201);
        
    }

}
