<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class UntilityController extends Controller
{
    // management sdm
    public function sdm(){
        $data['title'] = 'Manajemen SDM';
        $data['crumb'] = 'Konsultan Manajemen SDM';
        $data['sub'] = 'Konsultan Manajemen SDM';
        $data['manage_sdm'] = DB::table('untility')->where('key','managemen-sdm')->first();
        $data['pointsdm'] = DB::table('point_section')->get();
        return view('untility.sdm.index',$data);
    }
    public function create_sdm(){
        $data['title'] = 'Manajemen SDM';
        $data['crumb'] = 'Create Konsultan Manajemen SDM';
        $data['sub'] = 'Create Konsultan Manajemen SDM';
        return view('untility.sdm.create',$data);
    }
    public function store_sdm(Request $request){
        try {
            $data = [
                'judul'     => $request->title,
                'deskripsi' => $request->body,
                'key'       => 'managemen-sdm',
            ];
            DB::table('untility')->insert($data);
            return redirect('/managemen-sdm')->with('success','Managemen SDM Berhasil Dibuat.');
        }catch(Exception $e){
            return redirect('/managemen-sdm')->back()->with('error','Managemen SDM Gagal Dibuat.');
        }
    }
    public function edit_sdm(){
        $data['title']  = 'Manajemen SDM';
        $data['crumb']  = 'Edit Konsultan Manajemen SDM';
        $data['sub']    = 'Edit Konsultan Manajemen SDM';
        $data['data']   = DB::table('untility')->where('key','managemen-sdm')->first();
        return view('untility.sdm.edit',$data);
    }
    public function update_sdm(Request $request){
        try {
            $data = [
                'judul'     => $request->title,
                'deskripsi' => $request->body,
            ];
            DB::table('untility')->where('key','managemen-sdm')->where('id',$request->id)->update($data);
            return redirect('/managemen-sdm')->with('success','Managemen SDM Berhasil Diupdate.');
        }catch(Exception $e){
            return redirect('/managemen-sdm')->back()->with('error','Managemen SDM Gagal Diupdate.');
        }
    }
    // point section
    public function create_poin_sdm(){
        $data['title'] = 'Poin Manajemen SDM';
        $data['crumb'] = 'Create Poin Manajemen SDM';
        $data['sub'] = 'Create Poin Manajemen SDM';
        return view('untility.sdm.create_point',$data);
    }
    public function store_poin_sdm(Request $request){
        $path = 'logo-sdm/'.$request->get('foto');
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
                'urutan'    => $request->urutan,
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'image'     => $image,
                'key'       => 'managemen-sdm',
            ];
            DB::table('point_section')->insert($data);
            return redirect('/managemen-sdm')->with('success','Poin Managemen SDM Berhasil Dibuat.');
        }catch(Exception $e){
            return redirect('/managemen-sdm')->back()->with('error','Poin Managemen SDM Gagal Dibuat.');
        }
    }
    public function edit_poin_sdm($id){
        $data['title']  = 'Manajemen SDM';
        $data['crumb']  = 'Edit Konsultan Manajemen SDM';
        $data['sub']    = 'Edit Konsultan Manajemen SDM';
        $data['data']   = DB::table('point_section')->where('id',$id)->first();
        return view('untility.sdm.edit_point',$data);
    }
    public function update_poin_sdm(Request $request){
        if($request->image != null){
            $path = 'logo-sdm/'.$request->get('foto');
            if (! Storage::exists($path)) {
                Storage::makeDirectory($path,775,true);
            }
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $store = $request->file('image')->storeAs('public/'.$path, $fileName);
            $pathFile_application = 'public/storage/'.$path . $fileName ?? null;
            $base = URL::to('/');
            $image = $base.'/'.$pathFile_application;
        }else{
            $img = DB::table('point_section')->where('id',$request->id)->first();
            $image = $img->image;
        }
        try {
            $data = [
                'urutan'    => $request->urutan,
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'image'     => $image,
            ];
            DB::table('point_section')->where('id',$request->id)->update($data);
            return redirect('/managemen-sdm')->with('success','Poin Managemen SDM Berhasil DiUpdate.');
        }catch(Exception $e){
            return redirect('/managemen-sdm')->back()->with('error','Poin Managemen SDM Gagal DiUpdate.');
        }
    }
    public function destroy_poin_sdm(Request $request){
        try{
            DB::table('point_section')->where('id',$request->id)->delete();
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
    // pelatihan
    public function pelatihan(){
        $data['title'] = 'Pelatihan HR & SDM';
        $data['crumb'] = 'Pelatihan HR & SDM';
        $data['sub'] = 'Pelatihan HR & SDM';
        $data['pelatihan'] = DB::table('untility')->where('key','pelatihan')->first();
        return view('untility.pelatihan.index',$data);
    }
    public function create_pelatihan(){
        $data['title'] = 'Pelatihan HR & SDM';
        $data['crumb'] = 'Create Pelatihan HR & SDM';
        $data['sub'] = 'Create Pelatihan HR & SDM';
        return view('untility.pelatihan.create',$data);
    }
    public function store_pelatihan(Request $request){
        try {
            $data = [
                'judul'     => $request->title,
                'deskripsi' => $request->body,
                'key'       => 'pelatihan',
            ];
            DB::table('untility')->insert($data);
            return redirect('/pelatihan')->with('success','Pelatihan HR & SDM Berhasil Dibuat.');
        }catch(Exception $e){
            return redirect('/pelatihan')->back()->with('error','Pelatihan HR & SDM Gagal Dibuat.');
        }
    }
    public function edit_pelatihan(){
        $data['title'] = 'Pelatihan HR & SDM';
        $data['crumb'] = 'Edit Pelatihan HR & SDM';
        $data['sub']   = 'Edit Pelatihan HR & SDM';
        $data['data']  = DB::table('untility')->where('key','pelatihan')->first();
        return view('untility.pelatihan.edit',$data);
    }
    public function update_pelatihan(Request $request){
        try {
            $data = [
                'judul'     => $request->title,
                'deskripsi' => $request->body,
            ];
            DB::table('untility')->where('key','pelatihan')->where('id',$request->id)->update($data);
            return redirect('/pelatihan')->with('success','Pelatihan HR & SDM Berhasil Diupdate.');
        }catch(Exception $e){
            return redirect('/pelatihan')->back()->with('error','Pelatihan HR & SDM Gagal Diupdate.');
        }
    }
    // tentang rewata
    public function tentang_rewata(){
        $data['title'] = 'Tentang REWATA Consultant';
        $data['crumb'] = 'Tentang REWATA Consultant';
        $data['sub'] = 'Tentang REWATA Consultant';
        $data['tentang'] = DB::table('untility')->where('key','tentang')->first();
        return view('untility.tentang.index',$data);
    }
    public function create_tentang(){
        $data['title'] = 'Tentang REWATA Consultant';
        $data['crumb'] = 'Create Tentang REWATA Consultant';
        $data['sub'] = 'Create Tentang REWATA Consultant';
        return view('untility.tentang.create',$data);
    }
    public function store_tentang(Request $request){
        try {
            $data = [
                'judul'             => $request->title,
                'short_deskripsi'   => $request->jasa,
                'deskripsi'         => $request->body,
                'key'               => 'tentang',
            ];
            DB::table('untility')->insert($data);
            return redirect('/tentang')->with('success','Tentang REWATA Consultant Berhasil Dibuat.');
        }catch(Exception $e){
            return redirect('/tentang')->back()->with('error','Tentang REWATA Consultant Gagal Dibuat.');
        }
    }
    public function edit_tentang(){
        $data['title'] = 'Tentang REWATA Consultant';
        $data['crumb'] = 'Edit Tentang REWATA Consultant';
        $data['sub']   = 'Edit Tentang REWATA Consultant';
        $data['data']  = DB::table('untility')->where('key','tentang')->first();
        return view('untility.tentang.edit',$data);
    }
    public function update_tentang(Request $request){
        try {
            $data = [
                'judul'             => $request->title,
                'short_deskripsi'   => $request->jasa,
                'deskripsi'         => $request->body,
            ];
            DB::table('untility')->where('key','tentang')->where('id',$request->id)->update($data);
            return redirect('/tentang')->with('success','Tentang REWATA Consultant Berhasil Diupdate.');
        }catch(Exception $e){
            return redirect('/tentang')->back()->with('error','Tentang REWATA Consultant Gagal Diupdate.');
        }
    }
    // faq
    public function faq(){

    }
    public function create_faq(){

    }
    public function store_faq(){

    }
    public function edit_faq(){

    }
    public function update_faq(){

    }
    public function destroy_faq(){
        
    }
}
