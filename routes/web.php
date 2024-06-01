<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayananCompanyController;
use App\Http\Controllers\LayananPersonalController;
use App\Http\Controllers\UntilityController;
use App\Http\Controllers\BlogArtikelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\VideoYoutubeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WhyMeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class,'index']);
Route::get('/tentang-perusahaan', [LandingPageController::class,'tentang_kami']);
Route::get('/page-layanan-personal', [LandingPageController::class,'personal']);
Route::get('/show-layanan-personal', [LandingPageController::class,'show_detail_personal']);
Route::get('/page-layanan-perusahaan', [LandingPageController::class,'perusahaan']);
Route::get('/show-layanan-perusahaan', [LandingPageController::class,'show_detail_perusahaan']);
Route::get('/page-hubungi-kami', [LandingPageController::class,'hubungi_kami']);
Route::get('/page-blog-artikel', [LandingPageController::class,'blog_artikel']);
Route::resource('layanan-perusahaan', LayananCompanyController::class);
Route::post('remove-perusahaan', [LayananCompanyController::class,'destroy']);
Route::get('service-perusahaan', [LayananCompanyController::class,'service']);
Route::get('create-service-perusahaan', [LayananCompanyController::class,'service_create']);
Route::post('store-service-perusahaan', [LayananCompanyController::class,'service_store'])->name('store-service-perusahaan');
Route::get('edit-service-perusahaan/{id}', [LayananCompanyController::class,'service_edit'])->name('edit-service-perusahaan');
Route::post('update-service-perusahaan', [LayananCompanyController::class,'service_update'])->name('update-service-perusahaan');
Route::post('remove-service-perusahaan', [LayananCompanyController::class,'service_destroy']);
Route::resource('layanan-personal', LayananPersonalController::class);
Route::post('remove-personal', [LayananPersonalController::class,'destroy']);
Route::get('managemen-sdm', [UntilityController::class,'sdm']);
Route::get('managemen-sdm-create', [UntilityController::class,'create_sdm']);
Route::post('managemen-sdm-store', [UntilityController::class,'store_sdm'])->name('managemen-sdm-store');
Route::get('managemen-sdm-edit', [UntilityController::class,'edit_sdm'])->name('managemen-sdm-edit');
Route::post('managemen-sdm-update', [UntilityController::class,'update_sdm'])->name('managemen-sdm-update');
Route::get('poin-managemen-sdm-create', [UntilityController::class,'create_poin_sdm'])->name('poin-managemen-sdm-create');
Route::post('poin-managemen-sdm-store', [UntilityController::class,'store_poin_sdm'])->name('poin-managemen-sdm-store');
Route::get('poin-managemen-sdm-edit/{id}', [UntilityController::class,'edit_poin_sdm']);
Route::post('poin-managemen-sdm-update', [UntilityController::class,'update_poin_sdm'])->name('poin-managemen-sdm-update');
Route::get('pelatihan', [UntilityController::class,'pelatihan'])->name('pelatihan');
Route::get('pelatihan-create', [UntilityController::class,'create_pelatihan'])->name('pelatihan-create');
Route::post('pelatihan-store', [UntilityController::class,'store_pelatihan'])->name('pelatihan-store');
Route::get('pelatihan-edit', [UntilityController::class,'edit_pelatihan'])->name('pelatihan-edit');
Route::post('pelatihan-update', [UntilityController::class,'update_pelatihan'])->name('pelatihan-update');
Route::get('tentang', [UntilityController::class,'tentang_rewata']);
Route::get('tentang-create', [UntilityController::class,'create_tentang']);
Route::post('tentang-store', [UntilityController::class,'store_tentang'])->name('tentang-store');
Route::get('tentang-edit', [UntilityController::class,'edit_tentang'])->name('tentang-edit');
Route::post('tentang-update', [UntilityController::class,'update_tentang'])->name('tentang-update');
Route::resource('blog', BlogArtikelController::class);
Route::resource('kelas', KelasController::class);
Route::post('remove-kelas', [KelasController::class,'destroy'])->name('remove-kelas');
Route::Resource('video-youtube', VideoYoutubeController::class);
Route::post('remove-video', [VideoYoutubeController::class,'destroy'])->name('remove-video');
Route::Resource('profile', ProfileController::class);
Route::post('remove-profile', [ProfileController::class,'destroy'])->name('remove-profile');
Route::Resource('why-me', WhyMeController::class);