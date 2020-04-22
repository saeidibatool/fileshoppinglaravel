<?php

namespace App\Http\Controllers;

use App\Factor;
use App\Product;
use App\Basket;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factors = auth()->user()->factor()->orderBy('created_at', 'DESC')->get();
        return view('site.factor', compact('factors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $r = $request->all();
        $ids = $r['request'];
        $factor = Factor::create([
              'user_id'=>auth()->user()->id,
              'sum'=>0,
              'status'=>1
            ]);
        $sum = 0;
        for ($id = 0; $id < sizeof($ids); $id++){
            $basket = Basket::find($ids[$id]);
            $product = Product::find($basket->product_id);
            $product->increment('sales_number');
            $sum += (1-$product->discount/100)*$product->price;
            $basket->update(['status' => 1]);
            $product->factor()->attach($factor);
        }
        $factor->update(['sum'=>$sum]);
        $factors = Factor::where('id', $factor->id)->get();
//        dd($factors);
        return view('site.factor', compact('factors'));
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function show(Factor $factor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function edit(Factor $factor)
    {
        dd($factor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factor $factor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factor $factor)
    {
        //
    }
}
