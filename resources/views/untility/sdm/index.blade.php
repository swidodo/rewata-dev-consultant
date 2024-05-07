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
          <li class="breadcrumb-item active" aria-current="page">{{ $crumb }}</li>
        </ol>
    </nav>
    
    <div class="mt-5 card">
        <div class="card-header text-light bg-danger border border-danger">
            <strong>{{ $sub }}</strong>
        </div>
        <div class="card-body border border-danger">
            <div class="table-responsive">
                @if(isset($manage_sdm))
                    <a href="/managemen-sdm-edit" class="btn btn-primary mb-1 float-end">Edit</a>
                @else
                    <a href="/managemen-sdm-create" class="btn btn-primary mb-1 float-end">Create</a>
                @endif
                @if(isset($manage_sdm))
                    <h3>Judul</h3>
                    <h4>{{$manage_sdm->judul}}</h4>
                    <h3>Deskripsi</h3>
                    <h4>{!! $manage_sdm->deskripsi !!}</h4>
                    <hr class="border border-2 border-danger">
                    <div class="row">
                        <div class="col-md-6"><h4>POINT SECTION</h4></div>
                        <div class="col-md-6"><a href="/poin-managemen-sdm-create" class="btn btn-primary mb-1 float-end">Create</a></div>
                        <div class="row mt-4">
                            <div class="container">
                                @foreach ($pointsdm as $point)
                                    <div class="col-md-3">
                                        <div style="max-height: 70px;">
                                            <img src="{{asset('/storage/logo-sdm/'.basename($point->image))}}" class="img-fluid h-100" width="70" />
                                        </div>
                                        <div class="mt-3">
                                            {!! $point->judul !!}
                                        </div>
                                        <div class="mt-3">
                                            {!! $point->deskripsi !!}
                                        </div>
                                        <div class="mb-4 mt-4">
                                            <button class="btn btn-success rounded-pill py-2">{{$point->urutan}}</button>
                                            <a href="/poin-managemen-sdm-edit/{{$point->id}}" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                                            <button class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr class="border border-2 border-danger">
                    
                    @foreach ($pointsdm as $psdm)
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
        });
        $('#summertitle').summernote();
        $('#summerbody').summernote();
        $(document).on('click','.delete-personal',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id')
            Swal.fire({
                title: 'Are you sure ?',
                text: "You want remove record this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then(function(confirm){
                if (confirm.value == true){
                    $.ajax({
                        url : 'remove-personal',
                        type : 'post',
                        data : {id : id},
                        dataType : 'json',
                        beforeSend : function(){

                        },
                        success : function(respon){
                            swal.fire({
                                icon : respon.status,
                                text : respon.msg,
                            })
                           $('#'+id).fadeOut('slow');
                        },
                        error : function (){
                            alert('There is an error !, please try again')
                        }
                    })
                }
            })
        })
    });
</script>
@endsection()