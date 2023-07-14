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
        $umkm = Umkm::all()->where('pelaku_umkm_id', $id);

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
            'pelaku_umkm_id' => 'required',
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
            'pelaku_umkm_id' => $validated['pelaku_umkm_id'],
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
            'pelaku_umkm_id' => 'string',
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
            'pelaku_umkm_id' => $validated['pelaku_umkm_id'],
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
