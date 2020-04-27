<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function ImageUploader($file, $location){
    $filename = time()."-".$file->getClientOriginalName();
    $path = public_path("/".$location);
//      dd($path);
    $file->move($path,$filename);
//dd("ok");
    
    return "$location".$filename;

  }
}
