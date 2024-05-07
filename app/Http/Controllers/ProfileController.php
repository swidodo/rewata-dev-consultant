<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(){
        $data['page'] = 'Profile';
        $data['title'] = 'Profile CEO';
        $data['profile'] = Profile::all();   
        return view('profile.index',$data);
    }
    public function create(){
        return view('profile.create');
    }
    public function store(Request $request){
        $path = 'profile/'.$request->get('foto');
        if (! Storage::exists($path)) {
            Storage::makeDirectory($path,775,true);
        }
        
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $store = $request->file('image')->storeAs('public/'.$path, $fileName);
        $pathFile_application = 'uploads/'.$path . $fileName ?? null;
        $base = URL::to('/');
        $image = $base.'/'.$pathFile_application;
        try {
            $data = [
                'name'      => $request->name,
                'specialis' => $request->spesialis,
                'education' => $request->education,
                'skill'     => $request->skill,
                'experience'=> $request->experience,
                'image'     => $image,
            ];
            Profile::create($data);
            return redirect('/profile')->with('success','profile Tidak berhasil Dibuat.');
        }catch(Exception $e){
            return redirect()->back()->with('error','profile Tidak berhasil !');
        }
    }
    public function edit($id){
        $data['profile'] = Profile::where('id',$id)->first();
        return view('profile.edit',$data);
    }
    public function update(Request $request, $id){
        if($request->image != null){
            $path = 'profile/'.$request->get('foto');
            if (! Storage::exists($path)) {
                Storage::makeDirectory($path,775,true);
            }
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $store = $request->file('image')->storeAs('public/'.$path, $fileName);
            $pathFile_application = 'uploads/'.$path . $fileName ?? null;
            $base = URL::to('/');
            $image = $base.'/'.$pathFile_application;
        }else{
            $img = Profile::where('id',$id)->first();
            $image = $img->image;
        }
        try {
            $data = [
                'name'      => $request->name,
                'specialis' => $request->spesialis,
                'education' => $request->education,
                'skill'     => $request->skill,
                'experience'=> $request->experience,
                'image'     => $image,
            ];
            Profile::where('id',$id)->update($data);
            return redirect('/profile')->with('success','Profile Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Profile Gagal Di Update !');
        }
    }
    public function destroy(Request $request){
        try{
            Profile::where('id',$request->id)->delete();
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
