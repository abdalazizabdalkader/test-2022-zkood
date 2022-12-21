<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {


        if ($request->has('unit_id')){
            $unit = Unit::findOrFail($request->unit_id);
            $inventory = Inventory::where('product_id',$product->id)->where('unit_id',$request->unit_id)->first();
            // dd($inventory->amount, $unit->modifier);
            $total_quantity_by_unit_id = $inventory->amount * $unit->modifier;
            return response()->json([
                'name'  => $product->name,
                'total_quantity_by_unit_id'    => $total_quantity_by_unit_id,
                'created_at'    =>  $product->created_at->format('Y-m-d H:i:s'),
                'image_path'  => $product->image_path
            ],200);


        }
        return response()->json([
            'name'  => $product->name,
            'total_quantity'    => $product->total_quantity,
            'created_at'    =>  $product->created_at->format('Y-m-d H:i:s'),
            'image_path'  => $product->image_path,

        ],200);

        // return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
