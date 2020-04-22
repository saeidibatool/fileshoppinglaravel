<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show(Product $pro)
    {
      $comments = $pro->comments->where('status','1');
      // dd($comment);
      $rates = $pro->ratings;
      // dd($rates);
      $rating = 0;
      if(!empty($rates)){
        foreach ($rates as $rate) {
          $rating += $rate->rating;
        }
        $rating /= count($rates);
      }
      // dd($rating);


      $mortabet = [];
      $ids = [];
      $tags = $pro->tags()->get();
      foreach($tags as $val){
        $products = $val->products()->get();
        foreach ($products as $product) {
          $ids = array_column($mortabet, 'id');
          if(!in_array($product->id, $ids) && ($product->id != $pro->id)){
            array_push($ids, $product->id);
            array_push($mortabet, $product);
          }
        }
      }
       return view('site.product',compact('pro','mortabet', 'comments', 'rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
