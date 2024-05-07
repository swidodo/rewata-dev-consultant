<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
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
        return view('kelas.create');
    }
    public function store(Request $request)
    {
        $path = 'kelas/'.$request->get('foto');
        if (! Storage::exists($path)) {
            Storage::makeDirectory($path,775,true);
        }
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $store = $request->file('image')->storeAs('public/'.$path, $fileName);
        $pathFile_application = 'storage/'.$path . $fileName ?? null;
        $base = URL::to('/');
        $image = $base.'/'.$pathFile_application;
        try {
            $data = [
                'title'             => $request->title,
                'short_description' => $request->short_description,
                'resource'          => $request->resource,
                'image'             => $image,
                // 'created_by' => Auth::user()->id,
            ];
            Kelas::create($data);
            return redirect('/kelas')->with('success','Kelas Rewata Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Kelas Rewata Tidak berhasil !');
        }
    }
    public function edit($id)
    {
        $data['kelas'] = Kelas::where('id',$id)->first();
        return view('kelas.edit',$data);
    }
    public function update(Request $request, $id)
    {
        if($request->image != null){
            $path = 'kelas/'.$request->get('foto');
            if (! Storage::exists($path)) {
                Storage::makeDirectory($path,775,true);
            }
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $store = $request->file('image')->storeAs('public/'.$path, $fileName);
            $pathFile_application = 'storage/'.$path . $fileName ?? null;
            $base = URL::to('/');
            $image = $base.'/'.$pathFile_application;
        }else{
            $img = Kelas::where('id',$id)->first();
            $image = $img->image;
        }
        try {
            $data = [
                'title'             => $request->title,
                'short_description' => $request->short_description,
                'resource'          => $request->resource,
                'image'             => $image,
                // 'created_by' => Auth::user()->id,
                'updated_at' => date('Y-m-d H:m:s')
            ];
            Kelas::where('id',$id)->update($data);
            return redirect('/kelas')->with('success','Kelas Rewata Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Kelas Rewata Gagal Di Update !');
        }
    }
    public function destroy(Request $request)
    {
        try{
            Kelas::where('id',$request->id)->delete();
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil dihapus.'
            ];
            return response()->json($res);
        }catch(Exception $e){
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal dihapus!'
            ];
            return response()->json($res);
        }
    }
}
