<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user_id=$request->user()->id;
        $products=Product::where('user_id',$user_id)->get();
        return response($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'price'=>'required'
        ]);

        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price
        ]);
        return response([
            'message'=>'product created successfully'
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response ($product,201);
    }

    public function update(Request $request,$id)
    {
        $product=Product::findOrFail($id);
        $product->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        return response([
            'message'=>'product updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $product=Product::where('id',$id)->delete();

        return response([
            'message'=>'Product deleted successful'
        ]);
    }
}
