<?php

namespace App\Http\Controllers;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog=Blog::all();

        return response()->json($blog,201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
            

        ]);
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('blogimage'), $imageName);
        return Blog::create($request->all());
    }

    public function show($id)
    {
        return Blog::find($id);
    }

    public function update(Request $request, $id)
    {
        $blog=Blog::find($id);
        $blog->update($request->all());
        return $blog;
    }

    public function destroy($id)
    {
        return Blog::destroy($id);
        return response()->json(["message"=>"Deleted"],201);
        
    }

}
