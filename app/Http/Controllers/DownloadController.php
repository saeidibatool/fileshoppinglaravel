<?php
//use App\Product;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function download($id)
 {
        $product = Product::find($id);
        $product->increment('download_number');
        $path = public_path()."/".$product->file;
        return Response::download($path);
 }
}
