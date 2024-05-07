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
          <li class="breadcrumb-item active" aria-current="page">Kelas Rewata</li>
        </ol>
    </nav>
    
    <div class="mt-5 card">
        <div class="card-header text-light bg-danger border border-danger">
            KELAS REWATA
        </div>
        <div class="card-body border border-danger">
            <div class="table-responsive">
                <a href="/kelas/create" class="btn btn-primary mb-1 float-end">Create</a>
                <table class="table table-striped table-hover table-bordered" id="tblLcompany">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Deskripsi Pendek</th>
                        <th class="text-center">Resource</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Created BY</th>
                        <th class="text-center">Created</th>
                        <th class="text-center">Updated</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kelas as $ly)
                        @php
                            $basename = basename($ly->image);
                        @endphp
                        <tr id="{{$ly->id}}">
                            <td class="text-center">{{ $no }}</td>
                            <td>{!! $ly->title !!}</td>
                            <td>{!! $ly->short_description !!}</td>
                            <td>{!! $ly->resource !!}</td>
                            <td width="150">
                                <a href="{{$ly->image}}" target="_blank">
                                    <img src="{{asset('storage/kelas/'.$basename)}}" class="img-fluid">
                                </a>
                            </td>
                            
                                @if( $ly->status == '1')
                                <td class="text-center"><span class="badge badge-success"></span> Publish</td>
                                @else
                                <td class="text-center"><span class="badge badge-success"></span> Waiting</td>
                                @endif
                            <td>{{ $ly->created_by }}</td>
                            <td>{{ $ly->created_at }}</td>
                            <td>{{ $ly->updated_at }}</td>
                            <td class="text-center">
                                <a href="/kelas/{{$ly->id}}/edit" class="btn btn-primary" title="Edit"><span class="fa fa-edit"></span></a>
                                <a href="/kelas/{{$ly->id}}" class="btn btn-info" title="Show detail"><span class="fa fa-eye"></span></a>
                                <a data-id = "{{$ly->id}}" class="btn btn-light border border-danger delete-kelas" title="Delete"><span class="fa fa-trash text-danger"></span></a>
                            </td>
                        </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
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
        $(document).on('click','.delete-kelas',function(e){
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
                        url : 'remove-kelas',
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