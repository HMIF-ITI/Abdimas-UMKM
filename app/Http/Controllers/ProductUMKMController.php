<?php

namespace App\Http\Controllers;

use App\Models\PelakuUmkm;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductUMKMController extends Controller
{
    public function index()
    {
        $item['umkms'] = Umkm::where('id_pelaku_umkm', Auth::id())->get();
        $umkm_ids = $item['umkms']->map(function ($umkm) {
            return $umkm->id;
        });
        $product = Product::with('umkm')->whereIn('id_umkm', $umkm_ids)->orderBy('created_at', 'DESC')->get();

        return view('umkm/product/index', ['products' => $product]);
    }

    public function create()
    {

        $umkm = Umkm::where('id_pelaku_umkm', Auth::id())->orderBy('name', 'ASC')->get();
        return view('umkm/product/add', ['umkms' => $umkm]);
    }

    public function store(Request $request)
    {
        // validasi form
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|max:300',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'id_umkm' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);

        // menyimpan foto ke dalam public/avatar
        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        //menambahkan data ke database
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'id_umkm' => $validated['id_umkm'],
            'image' => $saveImage['image']
        ]);

        return redirect('/umkm/product')->with('success', 'Product Berhasil Dibuat!');
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $umkm = Umkm::all();

        return view('umkm/product/detailproduct', ['products' => $product, 'umkms' => $umkm]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $umkm = Umkm::where('id_pelaku_umkm', Auth::id())->orderBy('name', 'ASC')->get();

        return view('umkm/product/edit', ['product' => $product, 'umkms' => $umkm]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string',
            'description' => 'string|max:300',
            'price' => 'integer',
            'stock' => 'integer',
            'id_umkm' => 'string',
            'image' => 'mimes:jpg,jpeg,png|max:5120'
        ]);

        // cek data avatar
        if ($request->file('image')) {
            // hapus foto yang lama
            Storage::delete($product->image);

            // simpan foto yang baru
            $newImage['image'] = Storage::putFile('public/image', $request->file('image'));
        }

        // update data pada database berdasarkan id
        Product::where('id', $id)->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'id_umkm' => $validated['id_umkm'],
            'image' => $newImage['image'],
        ]);


        return redirect('/umkm/product')->with('success', 'Product Berhasil Diubah!');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/umkm/product')->with('success', 'Product Berhasil Dihapus!');
    }
}
