<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $products = Product::get();
        $umkms = Umkm::get();

        return view('landingpage', ['products' => $products, 'umkms' => $umkms]);
        
    }


}
