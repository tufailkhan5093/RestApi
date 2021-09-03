<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
class DeliveryController extends Controller
{
    public function index()
    {
        $delivery=Delivery::all();

        return response()->json($delivery,201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'delivery_date'=>'required|date|date_format:Y-m-d|after:yesterday',
            'start_time'=>'required|after:today',
            'end_time'=>'required|after:start_time',
           

        ]);
        return Delivery::create($request->all());
    }

    public function show($id)
    {
        return Delivery::find($id);
    }

    public function update(Request $request, $id)
    {
        $delivery=Delivery::find($id);
        $delivery->update($request->all());
        return $delivery;
    }

    public function destroy($id)
    {
        return Delivery::destroy($id);
        return response()->json(["message"=>"Deleted"],201);
        
    }
}
