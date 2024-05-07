<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan_company as Company;
use App\Models\Layanan_personal as Personal;
use App\Models\Service;
use App\Models\WhyMe;
use App\Models\Artikel;
use App\Models\Kelas;
use App\Models\Profile;
use App\Models\VideoYoutube;
use Illuminate\Support\Facades\DB;
class LandingPageController extends Controller
{
    public function index(){
        $data['title']          ='Rewata Consultant';
        $data['company']        = Company::where('status','1')->get();
        $data['personal']       = Personal::where('status','1')->get();
        $data['kelas']          = Kelas::where('status','1')->get();
        $data['video']          = VideoYoutube::orderBy('id','DESC')->limit(12)->get();
        $data['konsultasi_sdm'] = DB::table('untility')->where('key','managemen-sdm')->first();
        $data['poin_sdm']       = DB::table('point_section')->orderBy('urutan','ASC')->get();
        $data['pelatihan']      = DB::table('untility')->where('key','pelatihan')->first();
        $data['tentang']        = DB::table('untility')->where('key','tentang')->first();
        return view('template-landing.index',$data);
    }
    public function tentang_kami(){
        $data['title']          ='Tentang Rewata Consultant';
        $data['tentang']        = DB::table('untility')->where('key','tentang')->first();
        $data['profile']        = Profile::all();
        $data['video']          = VideoYoutube::orderBy('id','DESC')->limit(12)->get();
        return view('template-landing.tentang-rewata',$data);
    }
    public function personal(){
        $data['title']          ='layanan-personal';
        $data['personal']       = Personal::where('status','1')->get();
        $data['video']          = VideoYoutube::orderBy('id','DESC')->limit(12)->get();
        return view('template-landing.layanan-personal',$data);
    }
    public function perusahaan(){
        $data['title']          ='layanan-personal';
        $data['company']        = Company::where('status','1')->get();
        $data['service']        = Service::all();
        $data['why_utama']      = WhyMe::where('key','poin_utama')->get();
        $data['why_sub']        = WhyMe::where('key','sub_poin')->get();
        $data['video']          = VideoYoutube::orderBy('id','DESC')->limit(12)->get();
        return view('template-landing.layanan-company',$data);
    }
    public function hubungi_kami(){
        $data['title']          ='Hubungi kami';
        return view('template-landing.hubungi-kami',$data);
    }
    public function blog_artikel(){
        $data['title']          ='blog dan artikel';
        $data['blog']           = Artikel::where('status','1')->get();
        $data['blog-artikel']   = DB::table('untility')->where('key','blog')->first();
        return view('template-landing.blog-artikel',$data);
    }
}
