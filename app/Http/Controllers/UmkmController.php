<?php

namespace App\Http\Controllers;

use App\Models\PelakuUmkm;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $umkm = Umkm::all()->where('id_pelaku_umkm', $id);

        return view('umkm/index', ['umkms' => $umkm]);
    }

    public function create()
    {
        $umkm = Umkm::all();

        $id = Auth::user()->id;
        $owner = PelakuUmkm::all()->where('id', $id);
        return view('umkm/add', ['umkms' => $umkm, 'owners' => $owner]);
    }

    public function store(Request $request)
    {
        // validasi form
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|max:300',
            'link_address' => 'required',
            'address' => 'required',
            'id_pelaku_umkm' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);

        // menyimpan foto ke dalam public/avatar
        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        //menambahkan data ke database
        Umkm::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'link_address' => $validated['link_address'],
            'id_pelaku_umkm' => $validated['id_pelaku_umkm'],
            'image' => $saveImage['image']
        ]);

        return redirect('/umkm')->with('success', 'UMKM Berhasil Dibuat!');
    }

    public function detail($id)
    {
        $umkm['umkms'] = Umkm::findOrFail($id);

        return view('umkm/detailumkm', ['umkms' => $umkm]);
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        $id = Auth::user()->id;
        $owner = PelakuUmkm::all()->where('id', $id);

        return view('umkm/edit', ['umkm' => $umkm, 'owners' => $owner]);
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'link_address' => 'string',
            'address' => 'string',
            'id_pelaku_umkm' => 'string',
            'image' => 'mimes:jpg,jpeg,png|max:5120'
        ]);

        // cek data avatar
        if ($request->file('image')) {
            // hapus foto yang lama
            Storage::delete($umkm->image);

            // simpan foto yang baru
            $newImage['image'] = Storage::putFile('public/image', $request->file('image'));
        }

        // update data pada database berdasarkan id
        Umkm::where('id', $id)->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'link_address' => $validated['link_address'],
            'id_pelaku_umkm' => $validated['id_pelaku_umkm'],
            'image' => $newImage['image'],
        ]);


        return redirect()->route('umkmindex')->with('success', 'UMKM Berhasil Diubah!');
    }

    public function destroy($id)
    {
        Umkm::destroy($id);

        return redirect()->route('umkmindex')->with('success', 'UMKM Berhasil Dihapus!');
    }
}
