@extends('master')

@section('title_page', 'Managemen Users')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12  ">

        

        <a class="btn btn-primary btn-sm" href="{{route('admin.create')}}">Tambah Data</a>
        <hr>

        <div class="x_panel">
            <div class="x_title">
                <h2>Data Admin</h2> 
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table id="datatable" class="table table-striped table-bordere">
                <thead>  
                    <th width="150px">Nama PIC</th>
                    <th width="150px">Nama Pengguna</th>
                    <th>Email</th> 
                    <th width="120px">Aksi</th>
                </thead>
                <tbody></tbody>
            </table>
             
        </div>
    </div>
</div> 
 

@stop

@push('scripts')
<script>
    $(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.index') }}",
            },
            columns: [ 
                {
                    data: 'pic_name',
                    name: 'pic_name'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                }, 
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        }); 


    });
    </script>
@endpush