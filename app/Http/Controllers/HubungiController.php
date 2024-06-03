<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubungiController extends Controller
{
    public function index()
    {
        $data['page']     = 'Kelas Rewata Consultant';
        $data['title']    = 'Kelas Rewata consultant';
        $data['kelas']    = Kelas::orderBy('id','DESC')->get();   
        return view('kelas.index',$data);
    }

    public function create()
    {
        try {
            $data = [
                'type_layanan'      => $request->type_layanan,
                'nama_lengkap'      => $request->nama_lengkap,
                'nama_perusahaan'   => $request->nama_perusahaan,
                'no_telepon'        => $request->no_telpon,
                'email'             => $request->email,
                'alamat'            => $request->alamat_kantor,
                'permasalahan'      => $request->permasalahan,
            ];
            Client::create($data);
            return redirect('/kelas')->with('success','Kelas Rewata Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Kelas Rewata Tidak berhasil !');
        }
    }

    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
