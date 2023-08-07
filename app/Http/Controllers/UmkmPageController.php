<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Models\Product;

class UmkmPageController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $umkms = Umkm::with(['pelaku_umkm'])
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(12);

        return view('user/umkm/umkmpage', ['umkms' => $umkms]);
    }
    public function detail($id)
    {
        $umkm = Umkm::with(['pelaku_umkm', 'products'])
            ->findOrFail($id);

        return view('user/umkm/detailumkmpage', ['umkm' => $umkm]);
    }
}
