<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warna;
use Psy\Util\Str;

class WarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['warna'] = Warna::all();
        return view('admin.warna.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warna.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'warna' => 'required|unique:warnas',
        ];

        $customMessages = [
            'warna.required' => 'Warna wajib diisi!',
            'warna.unique' => 'Warna sudah digunakan!',
        ];

        $this->validate($request, $rules, $customMessages);

        //Start Input
        $input = $request->all();
        $status = Warna::create($input);

        if ($status){
            return redirect()->route('warna.index')->with('success', 'Data Warna berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['warna'] = Warna::find($id);
        return view('admin.warna.form', $data);
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
        $rules = [
            'warna' => 'required|unique:warnas',
        ];

        $customMessages = [
            'warna.required' => 'Warna wajib diisi!',
            'warna.unique' => 'Warna sudah digunakan!',
        ];

        $this->validate($request, $rules, $customMessages);

        //Start Input
        $warna = Warna::find($id);
        $update = $request->all();
        $status = $warna->update($update);

        if ($status){
            return redirect()->route('warna.index')->with('success', 'Data Warna berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warna = Warna::find($id);
        $status = $warna->delete();
        if ($status){
            return 1;
        }else{
            return 0;
        }
    }
}
