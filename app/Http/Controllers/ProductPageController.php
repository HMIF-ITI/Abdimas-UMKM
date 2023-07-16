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
        $keyword = $request->keyword;
        $products = Product::with('umkm')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(12);
        return view('user/product/productpage', ['products' => $products]);
    }

    public function detail($id)
    {
        $product = Product::with(['umkm.pelaku_umkm'])
            ->findOrFail($id);

        return view('user/product/detailproductpage', ['product' => $product]);
    }
}
