<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // dd($request->all());
      $categories = Category::search($request->all());
      // $categories = Category::latest()->paginate(10);
      return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::where('chid', 0)->get();
      // dd($categories);
      return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
      $file = $request['image'];
      $image = $this->ImageUploader($file,'uploads/');
      // dd($image);

      $this->validate(request(),[
        'fa_name'=>'required',
        'en_name'=>'required',

      ]);
      $category = Category::create([
        'image'=>$image,
        'chid'=>$request['chid'],
        'fa_name'=>$request['fa_name'],
        'en_name'=>$request['en_name'],
      ]);


      return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      $categories = Category::where('chid', 0)->get();
      return view('admin.category.edit', compact('category', 'categories'));
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
      if($request['image']){
        $file = $request['image'];
        $image = $this->ImageUploader($file,'uploads/');
//        unlink($category->image);
      }else{
        $image = $category->image;
      }
      $data = $request->all();
      $data['image'] = $image;

      $category->update($data);
      return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      unlink($category->image);
      $category->delete();
      return redirect(route('category.index'));
    }
}
