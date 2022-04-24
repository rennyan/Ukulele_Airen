<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use Psy\Util\Str;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jenis'] = Jenis::all();
        return view('admin.jenis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis.form');
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
            'jenis' => 'required|unique:jenis',
        ];

        $customMessages = [
            'jenis.required' => 'Jenis wajib diisi!',
            'jenis.unique' => 'Jenis sudah digunakan!',
        ];

        $this->validate($request, $rules, $customMessages);

         //Start Input
         $input = $request->all();
         $status = Jenis::create($input);

         if ($status){
            return redirect()->route('jenis.index')->with('success', 'Data Jenis berhasil ditambahkan');
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
        $data['jenis'] = Jenis::find($id);
        return view('admin.jenis.form', $data);
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
            'jenis' => 'required|unique:jenis',
        ];

        $customMessages = [
            'jenis.required' => 'Jenis wajib diisi!',
            'jenis.unique' => 'Jenis sudah digunakan!',
        ];

        $this->validate($request, $rules, $customMessages);

        //Start Input
        $jenis = Jenis::find($id);
        $update = $request->all();
        $status = $jenis->update($update);

        if ($status){
            return redirect()->route('jenis.index')->with('success', 'Data Jenis berhasil diubah');
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
        $jenis = Jenis::find($id);
        $status = $jenis->delete();
        if ($status){
            return 1;
        }else{
            return 0;
        }
    }
}
