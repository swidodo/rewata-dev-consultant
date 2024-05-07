@extends('template-landing.layouts')
@section('page-layouts')
    <section class="d-flex justify-content-center align-items-center" style="background-size:cover !important;background: url({{asset('assets/img/zero-title.png')}})">
        <div class="p-section position-relative text-center" data-aos="zoom-in" data-aos-delay="100" style="margin-top: 50px;">
            <h2 class="text-dark">{!! 'HUBUNGI KAMI' !!}</h2>
            <div class="row">
                <h3><strong>______GROW WITH US______</strong></h3>
            </div>            
        </div>
    </section>
    <main id="main">
        <div class="section" style="background-color: #1F3A93">
            <div class="container">
                <div class="row w-100">
                    <div class="col-md-4 fs-5 py-2 text-light"><i class="fa-solid fa-phone"></i> {{'083896009671'}}</div>
                    <div class="col-md-4 fs-5 py-2 text-light"><i class="fa-brands fa-whatsapp fw-bold"></i> {{'083896009671'}}</div>
                    <div class="col-md-4 fs-5 py-2 text-light"><span class="fa fa-envelope"></span> {{'budi@rewata.com'}}</div>
                </div>
            </div>
        </div>
        <section id="konsultasi-personal" class="courses">
            <div class="p-section d-flex justify-content-center" data-aos="fade-up">
                <div class="card w-50 shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center">FORMULIR PENDAFTARAN</h3>
                        <form class="mt-4">
                            <div class="form-group mb-3">
                                <label>Tipe Layanan</label>
                                <select class="form-control-lg form-select" nama="type_layanan">
                                    <option value="">-- Pilih --</option>
                                    <option value="Perusahaan">Layanan Perusahaan</option>
                                    <option value="Sekolah">Layanan Sekolah</option>
                                    <option value="Personal">Layanan Peribadi / Personal</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>No Telepon</label>
                                <input type="text" name="no_telpon" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Alamat Kantor</label>
                                <input type="text" name="alamat_kantor" class="form-control">
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-primary rounded-pill mt-3 mb-4 px-5 shadow-sm"><strong>Kirim</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection()