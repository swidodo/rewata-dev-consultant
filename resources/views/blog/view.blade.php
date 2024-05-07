@extends('template-admin.layouts')
@section('page-content')
    <!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="container">
    <section class="mt-5">
        <nav class="mt-5" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Create Blog & Artikel</li>
            </ol>
        </nav>
        <div class="continer">
            <a href="/blog" class="btn btn-primary mb-5">Back</a>
            <section class="mb-5">
                <div class="image mb-5" style="max-height: 350px;min-height: 200px;">
                    <img src="{{asset('storage/blog/'.basename($blog->image))}}" class="img-fluid">
                </div>
            </section>
            <section class="mt-2">
                <div class="description">
                    {!! $blog->body !!}
                </div>
                <div class="update float-end">
                    Tanggal Update : {!! date('d-m-Y',strtotime($blog->updated_at)) !!}
                </div>
            </section>
        </div>
        
    </section>
</div>
@endsection()