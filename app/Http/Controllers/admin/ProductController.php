<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Producer;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request->all())){
            $products = Product::latest()->paginate(10);
        }else{
            $products = Product::orderBy($request['item'], $request['method'])->paginate(10);
        }
      return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('chId','!=',0)->get();
        $producers = Producer::all();
        $tags = Tag::all();
        return view('admin.product.create', compact('producers','categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = $request['tag_id'];
        $user_id = auth()->user()->id;
        $file1 = $request['image'];
        $image = $this->ImageUploader($file1,'images/');
        $file2 = $request['file'];
        $file3 = $this->ImageUploader($file2,'files/');

        $this->validate(request(),[
        'name'=>'required',
        'producer'=>'required|numeric',
        'discount'=>'required|numeric',
        'price'=>'required|numeric',
        'category'=>'required',

        ]);
        $product = Product::create([
        'name'=>$request['name'],
        'producer_id'=>$request['producer'],
        'body'=>$request['body'],
        'discount'=>$request['discount'],
        'price'=>$request['price'],
        'category_id'=>$request['category'],
        'image'=>$image,
        'file'=>$file3,
        ]);
        $product->tags()->attach($tags);
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $protag = $product->tags()->get();
//        dd($protag);
//        $ids = array_column($protag, 'id');
//        dd($ids);
        $categories = Category::where('chId','!=',0)->get();
        $producers = Producer::all();
        $tags = Tag::all();
        return view('admin.product.edit', compact('categories', 'producers','tags', 'protag', 'product'));
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
        if($request['image']){
        $file = $request['image'];
        $image = $this->ImageUploader($file,'images/');
//        unlink($product->image);
      }else{
        $image = $product->image;
      }
        if($request['file']){
        $file = $request['image'];
        $val = $this->ImageUploader($file,'files/');
//        unlink($product->file);
      }else{
        $val = $product->file;
      }
        
       
      $data = $request->all();
         $product->tags()->sync($data['tag_id']);
      $data['image'] = $image;
        $data['file'] = $val;

      $product->update($data);
      return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
//        unlink($product->image);
//        unlink($product->file);
        $product->delete();
        return redirect(route('product.index'));
    }
}
