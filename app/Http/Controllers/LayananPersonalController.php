<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Layanan_personal as Personal;
class LayananPersonalController extends Controller
{
    public function index(){
        $data['page']   = 'Layanan Personal';
        $data['title']  = 'Layanan Personal';
        $data['crumb']  = 'Layanan Personal';
        $data['sub']    = 'LAYANAN PERSONAL';
        $data['layanan'] = Personal::orderBy('created_at','DESC')->get();   
        return view('layanan.personal.index',$data);
    }
    public function create(){
        $data['crumb']  = 'Create Layanan Personal';
        $data['sub']    = 'FORM LAYANAN PERSONAL';
        return view('layanan.personal.create',$data);
    }
    public function store(Request $request){
        $path = 'layanan/personal/'.$request->get('foto');
        if (! Storage::exists($path)) {
            Storage::makeDirectory($path,775,true);
        }
        
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $store = $request->file('image')->storeAs('public/'.$path, $fileName);
        $pathFile_application = 'public/storage/'.$path . $fileName ?? null;
        $base = URL::to('/');
        $image = $base.'/'.$pathFile_application;
        try {
            $data = [
                'title'             => $request->title,
                'short_description' => $request->short_description,
                'body'              => $request->body,
                'image'             => $image,
                // 'created_by' => Auth::user()->id,
                // 'created_at' => 
                // 'updated_at' => 
            ];
            personal::create($data);
            return redirect('/layanan-personal')->with('success','Layanan Personal Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Layanan Personal Tidak berhasil !');
        }

    }
    public function edit($id){
        $data['crumb']  = 'Edit Layanan Personal';
        $data['sub']    = 'EDIT LAYANAN PERSONAL';
        $data['layanan'] = personal::where('id',$id)->first();
        return view('layanan.personal.edit',$data);
    }
    public function update(Request $request, $id){
        if($request->image != null){
            $path = 'layanan/personal/'.$request->get('foto');
            if (! Storage::exists($path)) {
                Storage::makeDirectory($path,775,true);
            }
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $store = $request->file('image')->storeAs('public/'.$path, $fileName);
            $pathFile_application = 'public/storage/'.$path . $fileName ?? null;
            $base = URL::to('/');
            $image = $base.'/'.$pathFile_application;
        }else{
            $img = personal::where('id',$id)->first();
            $image = $img->image;
        }
        try {
            $data = [
                'title'             => $request->title,
                'short_description' => $request->short_description,
                'body'              => $request->body,
                'image'             => $image,
                // 'created_by' => Auth::user()->id,
                // 'created_at' => 
                // 'updated_at' => 
            ];
            personal::where('id',$id)->update($data);
            return redirect('/layanan-personal')->with('success','Layanan Personal Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Layanan Personal Gagal Di Update !');
        }
    }
    public function destroy(Request $request){
        try{
            Personal::where('id',$request->id)->delete();
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
