<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class BlogArtikelController extends Controller
{
    public function index(){
        $data['title']  = 'blog & artikel';
        $data['crumb']  = 'Blog & artikel';
        $data['sub']    = 'Blog & artikel';
        $data['blog']   = Artikel::orderBy('created_at','DESC')->get();
        return view('blog.index',$data);
    }
    public function create(){
        return view('blog.create');
    }
    public function store(Request $request){
        $path = 'blog/'.$request->get('foto');
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
                'body'              => $request->body,
                'image'             => $image,
                // 'created_by' => Auth::user()->id,
                // 'created_at' => 
                // 'updated_at' => 
            ];
            Artikel::create($data);
            return redirect('/blog')->with('success','Layanan Perusahaan Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect('/blog')->back()->with('error','Layanan Perusahaan Tidak berhasil !');
        }

    }
    public function edit($id){
        $data['blog'] = Artikel::where('id',$id)->first();
        return view('blog.edit',$data);
    }
    public function update(Request $request,$id){
        if($request->image != null){
            $path = 'blog/'.$request->get('foto');
            if (! Storage::exists($path)) {
                Storage::makeDirectory($path,775,true);
            }
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $store = $request->file('image')->storeAs('public/'.$path, $fileName);
            $pathFile_application = 'storage/'.$path . $fileName ?? null;
            $base = URL::to('/');
            $image = $base.'/'.$pathFile_application;
        }else{
            $img = Artikel::where('id',$id)->first();
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
            Artikel::where('id',$id)->update($data);
            return redirect('/blog')->with('success','Blog Artikel Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Blog Artikel Gagal Di Update !');
        }
    }
    public function show($id){
        $data['blog'] = Artikel::where('id',$id)->first();
        return view('blog.view',$data);
    }
    public function destroy(){
        try{
            Artikel::where('id',$request->id)->delete();
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
