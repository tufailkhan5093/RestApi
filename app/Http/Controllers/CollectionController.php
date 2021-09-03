<?php

namespace App\Http\Controllers;
use App\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $discount=Collection::all();

        return response()->json($discount,201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'collection_date'=>'required|date|date_format:Y-m-d|after:yesterday',
            
            'start_time'=>'required|after:today',
            'end_time'=>'required|after:start_time',
           

        ]);
        return Collection::create($request->all());
    }

    public function show($id)
    {
        return Collection::find($id);
    }

    public function update(Request $request, $id)
    {
        $product=Collection::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id)
    {
        return Collection::destroy($id);
        return response()->json(["message"=>"Deleted"],201);
        
    }
}
