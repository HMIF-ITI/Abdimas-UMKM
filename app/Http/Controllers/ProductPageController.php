<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('umkm')
            ->get();
        return view('user/productpage', ['products' => $products]);
    }

    public function detail($id)
    {
        $product = Product::with(['umkm.pelaku_umkm'])
            ->findOrFail($id);

        return view('user/detailproductpage', ['product' => $product]);
    }
}
