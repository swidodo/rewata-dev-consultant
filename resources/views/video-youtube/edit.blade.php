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
    <div class="mt-5 card">
        <div class="card-header text-light bg-danger border border-danger">
            FORM EDIT VIDEO
        </div>
        <div class="card-body border border-danger">
            <form action="{{ route('video-youtube.update', $video->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row px-5">
                    <div class="form-group mb-3">
                        <label>Title</label>
                        <textarea name="title" class="form-control" rows="10" id="summertitle" name="editordata">{{ $video->title }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Url Video</label>
                        <input type="text" name="url" class="form-control" value="{{$video->url}}" />
                    </div>
                    <div class="form-group align-self-end mt-4">
                        <a class="btn btn-light border border-danger shadow-sm">Batal</a>
                        <button class="btn btn-primary shadow-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#summertitle').summernote();
    });
</script>
@endsection()