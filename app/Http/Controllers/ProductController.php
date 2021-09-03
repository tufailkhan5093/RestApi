<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
   
    public function index()
    {
        $product=Product::all();

        return response()->json($product,201);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'max_price'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'description'=>'required',
            'keywords'=>'required',
            'meta_description'=>'required',
            'image'=>'required',
            'category'=>'required',

        ]);

        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('productimage'), $imageName);

        return Product::create($request->all());
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy(Request $request,$id)
    {
        return Product::destroy($id);
  
    }


    //To Search the product by Name
    public function search($name)
    {
        return Product::where('name','like','%'.$name.'%')->get();
    }
}
