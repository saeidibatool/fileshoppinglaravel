<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $cat, Request $request)
    {
      // dd($request->all());
      
        $c = Category::where('chid',$cat->id)->get();
        
        
      if(empty($request->all())){
        if($cat->chid == 0){
            $c = Category::where('chid',$cat->id)->get();
            $cats = Category::where('chid',$cat->id)->pluck('id');
            $pros = Product::whereIn('category_id', $cats)->get();
//            dd($pros);
        }else{
          $pros = Product::where('category_id', $cat->id)->paginate(10);
        }
        return view('site.category' ,compact('pros','cat', 'c'));
      }else{
        if($cat->chid == 0){
            $c = Category::where('chid',$cat->id)->pluck('id');
            $pros = Product::whereIn('category_id', $c);
        }else{
          $pros = Product::where('category_id', $cat->id);
        }
          
        $products = Product::search($request->all(), $pros);
        return view('site.search', compact('products'));
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
