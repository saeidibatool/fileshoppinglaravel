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
          $pros=array();
          foreach($c as $item)
          {
            $products = Product::where('category_id',$item->id)->get();
            foreach ($products as $pro) {
              array_push($pros, $pro);
            }
          }
        }else{
          $pros = Product::where('category_id', $cat->id)->get();
        }
        return view('site.category' ,compact('pros','cat', 'c'));
      }else{
        if($cat->chid == 0){
          // dd("hi");
          // $pros = [];
          $pros = (object)[];

          foreach($c as $item)
          {
            $products = Product::where('category_id',$item->id);

            $pros = (object) array_merge((array) $pros, (array) $products);
            // dd($pros);
            // foreach ($products as $product) {
            //   array_push($pros, $product);
            // }
          }
//          $pros = (object) $pros;
          // foreach ($pros as $pro) {
          //   echo $pro->name."<br>";
          // }
          // die;
          // $pros = $pros->get();
          // dd($pros);
        }else{
          $pros = Product::where('category_id', $cat->id);
        }
          $pros = $pros->paginate(10);die;
        var_dump($pros);die;
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
