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
            PROFILE CEO
        </div>
        <div class="card-body border border-danger">
            <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row px-5">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <textarea name="name" class="form-control" rows="10" id="summername">{{$profile->name}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Sepesialis</label>
                        <textarea name="spesialis" class="form-control" rows="10" id="summerspecial">{{$profile->specialis}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pendidikan</label>
                        <textarea name="education" class="form-control" rows="10" id="summereducation">{{$profile->education}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Keahlian</label>
                        <textarea name="skill" class="form-control" rows="10" id="summerskill">{{$profile->skill}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pengalaman</label>
                        <textarea name="experience" class="form-control" rows="10" id="summerexperiance">{{$profile->experience}}</textarea>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="image" onchange="readFile(this)">
                        <div class="form-group align-self-end mt-4">
                            <a class="btn btn-light border border-danger shadow-sm">Batal</a>
                            <button class="btn btn-primary shadow-sm">Simpan</button>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <img id="img-show" src="{{asset('storage/profile/'.basename($profile->image))}}" style="margin-top: 25px; min-width: 30px; min-height : 30px; max-width : 100%;max-height:150;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#summername').summernote();
        $('#summerspecial').summernote();
        $('#summereducation').summernote();
        $('#summerskill').summernote();
        $('#summerexperiance').summernote();
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