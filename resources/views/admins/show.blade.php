@extends('master')

@section('title_page', 'Managemen Users')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12  "> 

        <a class="btn btn-dark " href="{{route('admin.index')}}"><i class="fa fa-arrow-circle-left"></i> Lihat Semua Data</a>

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
                <tbody>
                    <tr>                        
                        <th>Nama Lengkap Pengguna</th>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>                        
                        <th>Nama PIC</th>
                        <td>{{ $data->pic_name }}</td>
                    </tr>
                    <tr>                        
                        <th>Nama PIC Atasan</th>
                        <td>{{ $atasan->pic_name }}</td>
                    </tr>
                    <tr>                        
                        <th>Email Pengguna</th>
                        <td>{{ $data->email }}</td>
                    </tr>
                </tbody>
            </table>
             
        </div>
    </div>
</div> 
 

@stop 