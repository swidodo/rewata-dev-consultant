@extends('template-admin.layouts')
@section('page-content')
    <!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<section class="mt-5">
    <nav class="mt-5" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Blog & Artikel</li>
        </ol>
    </nav>
    
    <div class="mt-5 card">
        <div class="card-header text-light bg-danger border border-danger">
            FORM BLOG DAN ARTIKEL
        </div>
        <div class="card-body border border-danger">
            <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row px-5">
                    <div class="form-group mb-3">
                        <label>Title</label>
                        <textarea name="title" class="form-control" rows="10" id="summertitle"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Deskripsi Pendek</label>
                        <textarea name="short_description" class="form-control" rows="10" id="summerdesk"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Body</label>
                        <textarea name="body" class="form-control" rows="10" id="summerbody"></textarea>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label>Foto</label>
                        <input type="file" name="image" class="form-control" onchange="readFile(this)">
                        <div class="form-group align-self-end mt-4">
                            <a href="/blog" class="btn btn-light border border-danger shadow-sm">Batal</a>
                            <button class="btn btn-primary shadow-sm">Simpan</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img id="img-show" style="margin-top: 25px; min-width: 30px; min-height : 30px; max-width : 100%;max-height:150;">
                    </div>
                   
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#summertitle').summernote();
        $('#summerdesk').summernote();
        $('#summerbody').summernote();
    });
    function readFile(input) {
        let file = input.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            $('#img-show').attr('src',reader.result)
            console.log(reader.result);
        };
        reader.onerror = function() {
            console.log(reader.error);
        };
    }
</script>
@endsection()