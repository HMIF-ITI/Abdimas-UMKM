<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmPageController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with(['pelaku_umkm'])->get();

        return view('user/umkmpage', ['umkms' => $umkms]);
    }
    public function detail($id)
    {
        $umkm = Umkm::with(['pelaku_umkm'])
            ->findOrFail($id);

        return view('user/detailumkmpage', ['umkm' => $umkm]);
    }
}
