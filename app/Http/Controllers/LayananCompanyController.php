<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan_Company as Company;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LayananCompanyController extends Controller
{
    public function index(){
        $data['page'] = 'Layanan Perusahaan';
        $data['title'] = 'Layanan Perusahaan';
        $data['layanan'] = Company::where('status',1)->get();   
        return view('layanan.company.index',$data);
    }
    public function create(){
        return view('layanan.company.create');
    }
    public function store(Request $request){
        $path = 'layanan/perusahaan/'.$request->get('foto');
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
            ];
            Company::create($data);
            return redirect('/layanan-perusahaan')->with('success','Layanan Perusahaan Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Layanan Perusahaan Tidak berhasil !');
        }

    }
    public function edit($id){
        $data['layanan'] = Company::where('id',$id)->first();
        return view('layanan.company.edit',$data);
    }
    public function update(Request $request, $id){
        if($request->image != null){
            $path = 'layanan/perusahaan/'.$request->get('foto');
            if (! Storage::exists($path)) {
                Storage::makeDirectory($path,775,true);
            }
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $store = $request->file('image')->storeAs('public/'.$path, $fileName);
            $pathFile_application = 'storage/'.$path . $fileName ?? null;
            $base = URL::to('/');
            $image = $base.'/'.$pathFile_application;
        }else{
            $img = Company::where('id',$id)->first();
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
            Company::where('id',$id)->update($data);
            return redirect('/layanan-perusahaan')->with('success','Layanan Perusahaan Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Layanan Perusahaan Gagal Di Update !');
        }
    }
    public function destroy(Request $request){
        try{
            Company::where('id',$request->id)->delete();
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
    public function service(){
        $data['page'] = 'Service/Layanan';
        $data['title'] = 'Service-Layanan';
        $data['service'] = Service::all();   
        return view('layanan.company.service',$data);
    }
    public function service_create(){
        return view('layanan.company.service_create');
    }
    public function service_store(Request $request){
        try {
            $data = [
                'title'             => $request->title,
                'body'              => $request->body,
                // 'created_by' => Auth::user()->id,
            ];
            Service::create($data);
            return redirect('/service-perusahaan')->with('success','Service/Layanan Perusahaan Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Service/Layanan Perusahaan Tidak berhasil !');
        }

    }
    public function service_edit($id){
        $data['service'] = Service::where('id',$id)->first();
        return view('layanan.company.service_edit',$data);
    }
    public function service_update(Request $request){
        try {
            $data = [
                'title'             => $request->title,
                'body'              => $request->body,
                // 'created_by' => Auth::user()->id,
            ];
            Service::where('id',$request->id)->update($data);
            return redirect('/service-perusahaan')->with('success','Service/Layanan Perusahaan Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Service/Layanan Perusahaan Gagal Di Update !');
        }
    }
    public function service_destroy(Request $request){
        try{
            Service::where('id',$request->id)->delete();
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
