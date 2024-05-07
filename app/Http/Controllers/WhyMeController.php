<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhyMe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class WhyMeController extends Controller
{
    public function index(){
        $data['page'] = 'Mengapa Rewata';
        $data['title'] = 'Mengapa Rewata';
        $data['crumb'] = 'Mengapa Rewata';
        $data['sub'] = 'Mengapa Rewata';
        $data['why'] = WhyMe::all();   
        return view('layanan.why_me.index',$data);
    }
    public function create(){
        $data['page'] = 'Mengapa Rewata';
        $data['title'] = 'Mengapa Rewata';
        $data['crumb'] = 'Mengapa Rewata';
        $data['sub'] = 'Mengapa Rewata';
        return view('layanan.why_me.create',$data);
    }
    public function store(Request $request){
        $path = 'layanan/why_me/'.$request->get('foto');
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
                'key'               => $request->key,
                'urutan'            => $request->urutan,
                'title'             => $request->title,
                'body'              => $request->body,
                'image'             => $image,
                // 'created_by' => Auth::user()->id,
            ];
            WhyMe::create($data);
            return redirect('/why-me')->with('success','Mengapa Rewata Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Mengapa Rewata Tidak berhasil !');
        }

    }
    public function edit($id){
        $data['page'] = 'Mengapa Rewata';
        $data['title'] = 'Mengapa Rewata';
        $data['crumb'] = 'Mengapa Rewata';
        $data['sub'] = 'Mengapa Rewata';
        $data['why'] = WhyMe::where('id',$id)->first();
        return view('layanan.why_me.edit',$data);
    }
    public function update(Request $request, $id){
        if($request->image != null){
            $path = 'layanan/why_me/'.$request->get('foto');
            if (! Storage::exists($path)) {
                Storage::makeDirectory($path,775,true);
            }
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $store = $request->file('image')->storeAs('public/'.$path, $fileName);
            $pathFile_application = 'storage/'.$path . $fileName ?? null;
            $base = URL::to('/');
            $image = $base.'/'.$pathFile_application;
        }else{
            $img = WhyMe::where('id',$id)->first();
            $image = $img->image;
        }
        try {
            $data = [
                'key'               => $request->key,
                'title'             => $request->title,
                'urutan'            => $request->urutan,
                'body'              => $request->body,
                'image'             => $image,
                // 'created_by' => Auth::user()->id,
            ];
            WhyMe::where('id',$id)->update($data);
            return redirect('/why-me')->with('success','Mengapa Rewata Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Mengapa Rewata Gagal Di Update !');
        }
    }
    public function destroy(Request $request){
        try{
            WhyMe::where('id',$request->id)->delete();
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
