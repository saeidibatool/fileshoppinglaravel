<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites=Favorite::where('user_id', auth()->user()->id)->get();
      return view('site.favorite', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
        $id=$request->input('id');

        $product = Product::find($id);
        if(Favorite::where([
          ['user_id','=',auth()->user()->id],
          ['product_id','=',$product->id],
          ])->get()->count() == 0){
            Favorite::create([
              'user_id'=>auth()->user()->id,
              'product_id'=>$product->id,
            ]);
            
            return response()->json(['favorite_create'=>'success']);
          }
          else{
            return response()->json(['exists'=>'exists']);
          }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
      return redirect(route('favorite.index'));
    }
}
