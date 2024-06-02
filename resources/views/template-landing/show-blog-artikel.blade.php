

@extends('template-landing.layouts')
@section('page-layouts')
<style>
.list-group h3{
    font-size: 10pt;
}
</style>
    <section class="d-flex justify-content-center align-items-center px-5" style="background-size:cover !important;background: url({{asset('')}})">
        <div class="container">
            <h3 class="pt-4" style="margin-bottom: -50px !important;"><a href="/page-blog-artikel" class="btn btn-outline-danger"><i class="fa fa-arrow-left fs-lg"></i></a></h3>
        </div>
    </section>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container">
                        <img src="{{ $blog->image }}" class="img-fluid rounded border border-light border-1 shadow-sm">
                        <div><strong>{!! $blog->title !!}</strong></div>
                        <div class="pt-4">
                            {!! $blog->body !!}
                        </div>
                        <div class="mb-5"><p style="font-size: 10pt;"><i class="fa fa-edit"></i> Created at : {{ date('d-m-Y H:m:s',strtotime($blog->created_at))}}</p></div>
                    </div>
                </div>
                <div class="col-md-4 bg-light">
                    <div class="container">
                        <div class="list-group mt-4 mb-4 shadow-lg">
                            <a type="button" class="list-group-item list-group-item-action active" aria-current="true">
                            Relate Blog dan Artikel
                            </a>
                            @foreach ($all_blog as $all)
                                <a type="button" class="list-group-item list-group-item-action">
                                    <img src="{{ $all->image }}" class="rounded border border-2 shadow-sm float-start me-2" height="40">{!! $all->title !!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection()