<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $keyword = $request->keyword;
        // $bengkel = Bengkel::where('name', 'LIKE', '%' . $keyword . '%')
        //     ->orWhere('alamat', $keyword)->paginate(10);
        // return view('user/servicepage', ['bengkels' => $bengkel]);
        return view('user/productpage');
    }
}
