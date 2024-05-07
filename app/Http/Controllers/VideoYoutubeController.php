<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoYoutube;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VideoYoutubeController extends Controller
{
    public function index()
    {
        $data['page']       = 'Video Youtube';
        $data['title']      = 'Video Youtube';
        $data['video']     = VideoYoutube::all();   
        return view('video-youtube.index',$data);
    }
    public function create()
    {
        return view('video-youtube.create');
    }
    public function store(Request $request)
    {
        try {
            $data = [
                'title' => $request->title,
                'url'  => $request->url,
                // 'created_by' => Auth::user()->id,
            ];
            VideoYoutube::create($data);
            return redirect('/video-youtube')->with('success','Video Youtube Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Video Youtube Gagal Di Update !');
        }
    }
    public function edit($id)
    {
        $data['video'] = VideoYoutube::where('id',$id)->first();
        return view('video-youtube.edit',$data);
    }
    public function update(Request $request, $id)
    {
        try {
            $data = [
                'title' => $request->title,
                'url'  => $request->url,
                // 'created_by' => Auth::user()->id,
                'updated_at' => date('Y-m-d H:m:s')
            ];
            VideoYoutube::where('id',$id)->update($data);
            return redirect('/video-youtube')->with('success','Video Youtube Berhasil Di Update.');
        }catch(Exception $e){
            return redirect()->back()->with('error','Video Youtube Gagal Di Update !');
        }
    }
    public function destroy(Request $request)
    {
        try{
            VideoYoutube::where('id',$request->id)->delete();
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
