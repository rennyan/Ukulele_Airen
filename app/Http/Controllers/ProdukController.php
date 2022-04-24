<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Jenis;
use App\Models\Detail;
use App\Models\Warna;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Res
     * 
     *ponse
     */
    public function index()
    {
        $data['produk'] = Produk::with(['jenis', 'detail'])->get();
        return view('admin.produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jenis'] = Jenis::all();
        $data['warna'] = Warna::all();
        // $data['produk'] = Produk::all();
        // $data['detail'] = Detail::all();
        return view('admin.produk.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validProduk = $request->validate([
            'nama' => 'required|string',
            'jenis_id' => 'required',
            'hpp' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);
        
        $request->validate([
            'warna_id' => 'required',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'spesifikasi' => 'required',
            'foto_produk' => 'required',
            'foto_produk.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = time() . '.' . $request->foto_produk->extension();
        $request->foto_produk->move(public_path() . '/image/foto_produk/', $imageName);

        $product = Produk::create($validProduk);
        Detail::create([
            'produk_id' => $product->id,
            'nama' => $request['nama'],
            'jenis_id' => $request['jenis_id'],
            'warna_id' => $request['warna_id'],
            'stok' => $request['stok'],
            'deskripsi' => $request['deskripsi'],
            'spesifikasi' => $request['spesifikasi'],
            'hpp' => $request['hpp'],
            'harga_jual' => $request['harga_jual'], 
            'foto_produk' => $imageName,
            
        ]);

        // $input = $request->all();
        
        return redirect()->route('produk.index')->with('success', 'Data Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['produk'] = Produk::find($id);
        // $data['jenis'] = Jenis::find($id);
        // $data['warna'] = Warna::find($id);
        $data['detail'] = Detail::find($id);
        return view('admin.produk.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['jenis'] = Jenis::all();
        $data['produk']= Produk::find($id);
        $data['warna'] = Warna::all();
        $data['detail'] = Detail::all();

        return view('admin.produk.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validProduk = $request->validate([
            'nama' => 'required|string',
            'jenis_id' => 'required',
            'hpp' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);
        
        $request->validate([
            'warna_id' => 'required',
            'stok' => 'required|numeric',
            'deskripsi' => 'required|string',
            'spesifikasi' => 'required|string',
        ]);

        $produk = Produk::find($id);
        $produkDet = Detail::find($id);

        if ($request->foto_produk){
            $imageName = time() . '.' . $request->foto_produk->extension();
            $request->foto_produk->move(public_path() . '/image/foto_produk/', $imageName);
        } else {
            $imageName = $produkDet->foto_produk;
        }

        $produk = $produk->update($validProduk);
        $produkDet = $produkDet->update([
            // 'produk_id' => $produk->id,
            'detail' => $produkDet->id,
            'nama' => $request['nama'],
            'jenis_id' => $request['jenis_id'],
            'warna_id' => $request['warna_id'],
            'stok' => $request['stok'],
            'deskripsi' => $request['deskripsi'],
            'spesifikasi' => $request['spesifikasi'],
            'hpp' => $request['hpp'],
            'harga_jual' => $request['harga_jual'], 
            'foto_produk' => $imageName,
        ]);

        // $input = $request->all();
        // $status = Produk::create($input);

        // if ($status){
            return redirect()->route('produk.index')->with('success', 'Data Produk berhasil diubah');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $status = $produk->delete();
        if ($status){
            return 1;
        }else{
            return 0;
        }
    }
}
